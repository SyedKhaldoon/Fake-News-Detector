# Fake News Detector
News detection and prediction are two important aspects of news analytics. News detection involves identifying and categorizing news articles based on their topic, sentiment, source, and other relevant factors.News prediction involves forecasting future events based on the analysis of past news articles.

In this Project, We have used various natural language processing techniques and Deep learning algorithms to classify Pakistan Political news as Real or Fake and predict the probability of News to be authentic in the near future using keras and tensorrflow libraries in python.

## Problem Statement
To develop a technique through web portal which can detect news as Fake or Real and predict the analytical part.
## Motivation
A survey conducted by the Digital Rights Foundation in 2022 that 73% of Pakistanis had encountered fake news.Misinformation has had a significant impact in Pakistan over the last four to five years, and there is currently no system in place to detect misinformation and predict the analytical part.
## Getting Started
These instructions will get a copy of the project up and running on your local machine for development and testing.
### Prerequisites
Things you need to install:

1. Python 3.10
 * This setup requires Python 3.10 to be installed on your machine. Python can be downloaded from https://www.python.org/downloads/. Once you've downloaded and installed Python, you'll need to configure PATH variables and set a virtual enviornment on your VS Code. 
2. You will also need to download and install below packages after you install python 
 * keras
 * tensorflow
 * sklearn
 * flask
3. Xampp
 * You also need to install xampp for database. Xampp Can be downloaded from https://www.apachefriends.org/.
## Dataset
### Detection:
Because there was no dataset of Pakistan political news, we manually collected 5k text-based datasets related to Pakistan politics from various platforms, news channels, websites, and social media.We provided a total of 5K news, of which 4K are Real and 1K are fake News.The dataset has 18 columns in total, which are as follows:
 * Column 1: The ID of news
 * Column 2: News Title
 * Column 3: News Text which contains the claims and statement of News
 * Column 4: Published Date of news
 * Column 5: Source (channel Name) on which news was published
 * Column 6: Source URL
 * Column 7: Author of news who published
 * Column 8: Country (Pakistan)
 * Column 9: Language (English)
 * Column 10: Other Source (Other channel) which published news
 * Column 11: Other Source URL
 * Column 12: News Type (Website, Social Media)
 * Column 13: Party Affiliation to which party the news is associated
 * Column 14: Location of the speech or statement
 * Column 15: Region of the speech or statement
 * Column 16: Subject ( Categories: Cultural, Democratic, Educational, Economical, International Politics)
 * Column 17: Header Image URL (Image Related to news)
 * Column 18: Label (Label class contains: Real, Fake)
The dataset used for this project were in csv format named Detection_Real_4k_.csv and can be found in repo.
### Prediction:
Predicting the probability of news to be authentic in the near future is a challenging task, but it is one that is becoming increasingly important. With the rise of social media and the ease with which fake news can be spread, it is more important than ever to be able to distinguish between real and fake news.

We created a daatset of 300 news questions to predict news articles and check the probability of news. For example, 
 * Will Pakistan economy grow in 2026 ?
 * Who will be the next prime minister of pakistan ? 
 * Who will be the next army chief of Pakistan ?
 * or Will Pakistan's sports infrastructure improve in the future?
The dataset used for this project were in csv format named prediction_questions (1).csv and can be found in repo.

## Tools
### Frontend
 * HTML5
 * CSS3
 * Javascript
### Backend
 * PHP 7.4
 * Python 3.10
 * Flask

 ## Software Development Methodology
 We used Scrum Methodology, and in product backlog the project features include a text box where the user enters the news and two buttons detection and prediction where the news is detected as real or fake and the probability of the news is predicted, as well as feedback of the website.Every week a corner meeting is conducted to discuss the modules and updation of features.
 ![image](https://user-images.githubusercontent.com/129365210/234193820-4b9153ab-b120-413e-98fb-d869ca44eaca.png)

## Architecture Diagram
1. Dataset Generation
  * Data from Diversified Sources (Social Media, Websites, News Channels)
  * Data Extraction ( News Text,Date, Author etc)
  * Labeled Corpus (Collection of text data that has been manually annotated with labels )
2. Dataset Preprocessing using NLP(Natural Language Processing)
  * Redundancy (Removing Duplicates)
  * Normalize  <br>
    Data into a consistent and meaningful format so that it can be easily processed and analyzed. 
    For Example this sentence "Imran Khan criticised for defence of Pakistan blasphemy laws" is normalize to " Imran Khan was criticized for defending           Pakistan's blasphemy laws" 
  * Tokenize <br>
    Breaking down a piece of text into smaller units
    For example ['Imran', 'Khan', 'criticized', 'for', 'defense', 'of', 'Pakistan', 'blasphemy', 'laws']
  * Special Chracters Removal <br>
    Removing special characters from a string of text. Special characters are characters that are not letters, numbers, or spaces. They can include               punctuation marks, symbols For example Imran Khan criticized for defense of Pakistan blasphemy law
  * TF-IDF <br>
    term frequency-inverse document frequency which is used to evaluate the importance of a word in a document. The term frequency is the number of times a       word appears in a document. The inverse document frequency is a measure of whether a term is common or rare in a given document corpus. Here are the TF-     IDF scores for the words in the sentence "Imran Khan criticized for defense of Pakistan blasphemy law":
    | Word | TF | IDF | TF-IDF |
    |---|---|---|---|
    | Imran | 0.042 | 0.309 | 0.129 |
    | Khan | 0.042 | 0.309 | 0.129 |
    | criticized | 0.063 | 0.725 | 0.451 |
    | for | 0.094 | 0.518 | 0.489 |
    | defense | 0.063 | 0.649 | 0.411 |
    | of | 0.094 | 0.518 | 0.489 |
    | Pakistan | 0.042 | 0.309 | 0.129 |
    | blasphemy | 0.063 | 0.725 | 0.451 |
    | law | 0.063 | 0.649 | 0.411 |

The word "criticized" has the highest TF-IDF score because it is the most frequent word in the sentence and it also appears in a relatively small number of documents. The word "blasphemy" has the second highest TF-IDF score because it is a less common word, but it is still relevant to the topic of the sentence.
3. Feature Extraction <br>
Feature extraction is a process of transforming raw data into features that can be used for machine learning. Features are typically numerical values that represent some aspect of the data.
  * Lexical analysis and Token Separation <br>
    Lexical analysis is the process of breaking down a stream of characters into tokens.Tokenization is the process of identifying and separating tokens in a     stream of characters. This is typically done using a lexical analyzer, which is a program that is specifically designed to perform lexical analysis.
    Here is the lexical analysis and token separation of the sentence "Imran Khan criticized for defense of Pakistan blasphemy law":
    | Token | Type |
    |---|---|
    | Imran | Proper noun |
    | Khan | Proper noun |
    | criticized | Verb |
    | for | Preposition |
    | defense | Noun |
    | of | Preposition |
    | Pakistan | Proper noun |
    | blasphemy | Noun |
    | law | Noun |
  * Embeddings <br>
      An embedding is a vector of numbers that represents the meaning of a word.Here is the embedding of the sentence "Imran Khan was criticized for his           defense of Pakistan's blasphemy law":
    [-0.036, -0.008007, 0.010, 0.0057,...]
4. Detection
  * RNN  (Recurrent Neural Network) <br>
    A recurrent neural network (RNN) is a type of artificial neural network that is commonly used to process sequential data. This type of neural network has     a feedback loop that allows it to remember previous states, which makes it well-suited for tasks such as natural language processing and speech               recognition. 
    Limitation: incapable of handling such “long-term dependencies”.
    For RNN architecture Diagram See,https://miro.medium.com/v2/resize:fit:651/1*6xj691fPWf3S-mWUCbxSJg.jpeg
  * LSTM ( Long Short-Term Memory ) <br>
    Long short-term memory (LSTM) is a type of recurrent neural network (RNN) that is commonly used to process sequential data. LSTMs are able to learn long-     term dependencies, which makes them well-suited for tasks such as natural language processing and speech recognition.
    Limitation: LSTMs take longer to train, LSTMs require more memory to train.
    For LSTM architecture Diagram See,https://databasecamp.de/wp-content/uploads/lstm-architecture-1024x709.png
  * BI-LSTM ( Bidirectional LSTM ) <br>
    A bidirectional long short-term memory (BiLSTM) is a type of RNN that can process sequences in both directions, forward and backward. This makes it well-     suited for tasks such as natural language processing, where it can be used to understand the context of a word or phrase by looking at both the words         that come before it and the words that come after it.
    Limitation: Since BiLSTM has double LSTM cells so it is costly, BiLSTM is a much slower model, Requires more time for training
    For BI-LSTM architecture Diagram See,https://production-media.paperswithcode.com/methods/Screen_Shot_2020-05-25_at_8.54.27_PM.png
  * ENSEMBLE DNN
    An ensemble deep neural network (DNN) is a type of DNN that is made up of multiple individual DNNs. The individual DNNs are trained on the same dataset,     but they are trained independently of each other. The outputs of the individual DNNs are then combined to produce a single output.
    Here are some of the advantages of using an ensemble DNN:<br>
     * Improved performance: Ensemble DNNs are often able to achieve better performance than any of the individual models on their own. This is because              ensemble DNNs are able to learn from the strengths of each individual model and to avoid the weaknesses of each individual model.
     * Reduced variance: Ensemble DNNs are less likely to overfit the training data than any of the individual models on their own. This is because ensemble        DNNs are able to learn from the different perspectives of the individual models.
     * Increased robustness: Ensemble DNNs are more robust to noise in the training data than any of the individual models on their own. This is because            ensemble DNNs are able to learn from the different perspectives of the individual models.
    There are many different ways to ensemble models and the one we used is: <br>
    **Stacking**: <br>
    Stacking is a technique for creating an ensemble of models where we train a meta-model to combine the predictions of multiple base models.The meta-           model is trained on the predictions of the base models, and it learns how to combine these predictions to get a more accurate prediction.
    The three models RNN,LSTM, and BILSTM were independently trained on same detection dataset and then we trained a meta model logistic Regression to           combine the predictions of individual models which were then combined to produce a more accurate result.
6. Prediction
  * Deep Hybrid Model

![Final Architecture Diagram-page0001](https://user-images.githubusercontent.com/129365210/234273584-e94dfb17-93cf-4673-9b3c-1ad7c272064d.jpg)
## Project Overview
https://user-images.githubusercontent.com/129365210/234274201-a4302c18-6e51-4ac0-9ea7-fcd60fc100d6.mp4




 



 




