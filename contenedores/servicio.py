from flask import Flask, jsonify
app = Flask(__name__)

@app.route('/')

def prueba_estado():

    return jsonify({"status":"OK"})

@app.route('/status')

def prueba_ok():

    return jsonify({"status":"OK"})

if __name__ == "__main__":
    
	app.run(host='0.0.0.0', debug=True)
