from flask import Flask, render_template, request
import numpy as np
from tensorflow.keras.models import load_model
from sklearn.preprocessing import MinMaxScaler

app = Flask(__name__)

# Load the pre-trained BiLSTM model
model = load_model("bilstm_model29.h5") #same1 model model22 model2 model3 model24

# Load the scaler used during training
scaler = MinMaxScaler()  # Assuming you used MinMaxScaler during training
scaler.min_, scaler.scale_ = np.load("scaler_params.npy")

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/result', methods=['POST'])
def predict():
    if request.method == 'POST':
        # Extract feature values from the form
        feature1 = float(request.form['feature1'])
        feature2 = float(request.form['feature2'])
        feature3 = float(request.form['feature3'])
        feature4 = float(request.form['feature4'])
        feature5 = float(request.form['feature5'])

        # Scale the input features
        input_features = np.array([[feature1, feature2, feature3, feature4, feature5]])
        scaled_features = scaler.transform(input_features)

        # Make the prediction
        predicted_yield = model.predict(scaled_features)[0][0]

        return render_template('result.html', predicted_yield=predicted_yield)
        #return render_template('result.html', predicted_yield=predicted_yield, input_features=input_features)

if __name__ == '__main__':
    app.run(debug=True)
