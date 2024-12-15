import pandas as pd
import numpy as np
import pymysql  # To connect to MySQL
from statsmodels.tsa.arima.model import ARIMA
from sklearn.ensemble import RandomForestRegressor
import datetime

# Connect to MySQL Database
conn = pymysql.connect(host='localhost', user='root', password='', database='dengue_cases')
cursor = conn.cursor()

# Step 1: Fetch historical dengue case data
query = "SELECT month, cases FROM dengue_cases_2022_2024 ORDER BY year, FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')"
data = pd.read_sql(query, conn)

# Step 2: Preprocess Data
# Ensure month names are converted into datetime format
data['month'] = pd.to_datetime(data['month'], format='%B')  # e.g., 'January', 'February'
data['cases'] = pd.to_numeric(data['cases'])  # Ensure cases are numbers

# Prepare data for modeling
data.set_index('month', inplace=True)
data = data.resample('M').sum()  # Resample by month to ensure uniformity

# Step 3: Train ARIMA Model
arima_model = ARIMA(data['cases'], order=(2, 1, 2))  # ARIMA(p=2, d=1, q=2)
arima_result = arima_model.fit()

# Step 4: Train Random Forest Model
X = np.arange(len(data)).reshape(-1, 1)  # Convert months to numbers for RandomForest
y = data['cases'].values

rf_model = RandomForestRegressor(n_estimators=100)
rf_model.fit(X, y)

# Step 5: Predict Cases for 2025
future_months = pd.date_range(start='2025-01-01', end='2025-12-01', freq='MS')
future_X = np.arange(len(data), len(data) + len(future_months)).reshape(-1, 1)

# ARIMA Predictions
arima_predictions = arima_result.forecast(steps=12)

# Random Forest Predictions
rf_predictions = rf_model.predict(future_X)

# Step 6: Combine Predictions into a DataFrame (Average of ARIMA and RandomForest)
predictions = pd.DataFrame({
    'month': future_months.strftime('%B'),
    'ARIMA': arima_predictions.round(),
    'RandomForest': rf_predictions.round(),
    'Combined': (arima_predictions + rf_predictions) / 2  # Combining ARIMA and Random Forest predictions
})

# Step 7: Save Predictions to Database
cursor.execute("CREATE TABLE IF NOT EXISTS dengue_predictions_2025 (month VARCHAR(20), ARIMA INT, RandomForest INT, Combined FLOAT)")
conn.commit()

# Insert Predictions
for i, row in predictions.iterrows():
    cursor.execute("INSERT INTO dengue_predictions_2025 (month, ARIMA, RandomForest, Combined) VALUES (%s, %s, %s, %s)",
                   (row['month'], int(row['ARIMA']), int(row['RandomForest']), row['Combined']))
conn.commit()

print("Predictions for 2025 saved successfully!")

# Close Database Connection
cursor.close()
conn.close()
