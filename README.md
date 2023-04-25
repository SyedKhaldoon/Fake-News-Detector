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
 ![Final Architecture Diagram-page0001](https://user-images.githubusercontent.com/129365210/234196827-df2d6916-0171-4c17-8522-828624c3152c.jpg)


 



 




