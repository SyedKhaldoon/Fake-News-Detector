
from keras.preprocessing.sequence import pad_sequences
import joblib
from flask import Flask, escape, request, render_template
import joblib
from keras.models import load_model
from flask_mysqldb import MySQL
import openai
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.feature_extraction.text import TfidfVectorizer
import os
import csv
app = Flask(__name__, template_folder='template')
openai.api_key = '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'
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'fake news detector'
mysql = MySQL(app)


def find_probability(input_question, generated_answer):
    # Convert the input question and generated answer into vectors using the model
    vectorizer = TfidfVectorizer()
    input_vec = vectorizer.fit_transform(input_question)
    answer_vec = vectorizer.transform(generated_answer)
    cosine_sim = cosine_similarity(input_vec, answer_vec)
    return cosine_sim


def predict_answer(question):
    response = openai.Completion.create(
        engine="text-davinci-002",
        prompt=question,
        max_tokens=1024,
        n=1,
        stop=None,
        temperature=0.5,
    )
    answer = response.choices[0].text.strip()
    return answer


@app.route('/')
def index():
    return render_template('index.html')


@app.route('/startpage')
def home():
    return render_template('starting_page.html')


@app.route('/signup', methods=['POST'])
def signup():

    if request.method == 'POST':

        return render_template('sigup.html')


@ app.route('/newsenter', methods=['POST'])
def newsenter():
    conn = mysql.connection.cursor()
    if request.method == 'POST':
        register = request.form
        email = register['email']
        password = register['pass']
        confirmpassword = register["confirmpsw"]
        conn.execute("SELECT *from registration where  email='"+email+"' ")
        r = conn.fetchone()

        token = os.urandom(16)
        if r:
            return 'Email already exists'
        else:
            if password == confirmpassword:
                conn.execute(
                    'INSERT INTO registration VALUES(NULL,%s, %s, %s)', (email, password, token))
                mysql.connection.commit()
                return render_template('detect1.html')


@ app.route('/login', methods=['GET', 'POST'])
def login():
    conn = mysql.connection.cursor()
    if request.method == 'POST':
        login = request.form
        email = login['email']
        password = login['Psw']

        conn.execute("SELECT *from registration where  email='" +
                     email+"' and pass='"+password+"' ")
        r = conn.fetchone()
        if r:
            return render_template('detect1.html')
        else:
            message = 'Enter correct Emial/password!'
            return render_template('sigup.html', message=message)


@ app.route('/forgot')
def forgot():
    return render_template('forgotpassword.php')


@ app.route('/feedback')
def feed():
    return render_template('feedback.html')


@ app.route('/feed', methods=['POST'])
def feedback():
    conn = mysql.connection.cursor()
    if request.method == 'POST':
        feedback = request.form
        name = feedback['name']
        email = feedback['email']
        message = feedback["message"]
        conn.execute('INSERT INTO feedback VALUES(NULL,%s, %s, %s)',
                     (name, email, message))
        mysql.connection.commit()
        mess = 'Thank You ' + name + ' for your Feedback'
        return render_template('feedback.html', mess=mess)


@ app.route('/about')
def about():
    return render_template('about_us.html')


@ app.route('/det')
def det():
    return render_template('detect1.html')


@ app.route('/detect', methods=['POST'])
def detect():

    tokenizer = joblib.load('tokenizer.pkl')
    modeldetect = load_model('model.h5', compile=False)

    if request.method == 'POST':
        inputStacked = [request.form['News_Title']]
        news_token = tokenizer.texts_to_sequences(inputStacked)
        paded_news = pad_sequences(news_token, maxlen=1000)
        predictionStacked = (modeldetect.predict(
            paded_news) >= 0.5).astype(int)
        print(predictionStacked)

        with open("Detection_Real_4k_.csv", encoding='utf-8', mode="r") as f:
            reader = csv.DictReader(f, delimiter=",")
            for row in reader:
                if row['News_Title'] == inputStacked[0] or row['News_Text'] == inputStacked[0]:
                    news_title = row['News_Title']
                    news_text = row['News_Text']
                    image = row['Header_Image_URL']
                    Source = row['Source']
                    Source_URL = row['Source_URL']
                    Published_Date = row['Published_ Date']
                    Country = row['Country']
                    Party_Affiliation = row['Party_Affiliation']
                    Author = row['Author']
                    return render_template('news.html', news_title=news_title, news_text=news_text, image=image,
                                           Source=Source, Source_URL=Source_URL, Published_Date=Published_Date, Country=Country,
                                           Party_Affiliation=Party_Affiliation, Author=Author, predictionStacked=predictionStacked)


@ app.route('/predict', methods=['POST'])
def predict():
    if request.method == 'POST':
        prompt = request.form['News_Title']
        answer = predict_answer(prompt)
        prompt = [prompt]
        answer = [answer]
        print(answer)
        probability = find_probability(prompt, answer)
        print(probability)
        return render_template('predictinfo.html', probability=probability, answer=answer)


@ app.route('/newsinfo')
def newsinfo():
    return render_template('detect1.html')


if __name__ == '__main__':
    app.run(debug=True)
