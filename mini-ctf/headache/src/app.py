from flask import Flask, url_for, request, render_template

app = Flask(__name__)


@app.route("/")
def hello_world():
    polite = False
    if request.headers.get('wanna-something') == "the-flag":
        polite = True
    return render_template('index.html', polite=polite)


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337)
