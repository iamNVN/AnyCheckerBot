# <h1 align="center"><a href="https://github.com/IndianBots/AnyCheckerBot"><img src="https://github-readme-stats.vercel.app/api/pin?username=IndianBots&show_icons=true&theme=dark&hide_border=true&repo=AnyCheckerBot"></a></h1>

# <b>[AnyChecker Bot](https://telegram.me/AnyCheckerBot)</b></h1>

#### Table Of Contents
* [About](#About)
* [Creator](#Creator)
* [License](#License)
* [Deployment](#Deployment)


## About

**[AnyChecker Bot](https://telegram.me/AnyCheckerBot)** is an Open Source Project for IndianBots Under the License **GNU Public License V3.0**. This Project is Base on Pure PHP and it doesn't Use any External Libraries.


#### Features

* Bin Checker
* Covid-19 Stats
* Currency Converter
* Dictionary 
* IBAN Checker
* Proxy Scrapper
* Stripe Key Checker
* Weather Displayer

#### #ToDo Lists

- [ ] URL Shortner with GPLinks & Bitly Support
- [ ] Valid Email Checker
- [ ] Add Database for Users and Add Broadcast System
- [x] ~~Covid-19 Stats~~
- [x] ~~Currency Converter~~

## License
[![GNU GPLv3 Image](https://www.gnu.org/graphics/gplv3-127x51.png)](http://www.gnu.org/licenses/gpl-3.0.en.html)  

**AnyChecker Bot is a Open Source Project for IndianBots Under The Terms And Conditions Of The GNU Public License V3.0**

You can use, study share and improve it at your will. Specifically you can redistribute and/or modify it under the terms of the [GNU General Public License](https://www.gnu.org/licenses/gpl.html) as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. 


## Deployment
**There Are 2 Ways**
* [LocalServer](#LocalServer)
* [Heroku](#Heroku)


### LocalServer

Edit The <code lang="php">Resources/Vars.php</code> File..

Replace `VARIABLES FROM CONFIG` With Your Vars And Save it.

1. Download an Run any Localhost. XAMPP Preffered.
2. Fork the Repo and Download it to your Local Machine. Copy it and Extract it to htdocs folder
3. Download Ngrok from [Here](https://ngrok.com/download)
4. Unzip the ngrok.exe file
5. Place the ngrok.exe in a folder of your choice
6. Use Authtoken to Authenticate Ngrok
7. Run ngrok.exe and Type the Following Command

```ngrok http https://localhost```

<br>

### Heroku
#### Easy Way to Deploy

[![Deploy To Heroku](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy?template=https://github.com/IndianBots/AnyCheckerBot)

- Only two environment variables are required
   - `BOT_TOKEN`:   You can get this value from [@Botfather](https://telegram.me/Botfather)
   - `BOT_USERNAME`:   Username of your Bot
- The Bot will not work without setting the mandatory vars.
<br>

#### Manual Way to Deploy


```
Fork the Repo
Create new App on Heroku
Connect your forked Github Repo to your Heroku App
Set Config Vars for `BOT_TOKEN` and `BOT_USERNAME` in the Settings of the app
Then Manual Deploy and done
```
<br>

## Creator
**This Open Source Project Was Created By [Ninja Naveen](https://telegram.me/ninjanaveen)**

**Star The Tool For More Support**
<p align="center">
<a href="https://telegram.me/ninjanaveen">
    <img src="https://avatars1.githubusercontent.com/u/67575446?s=460&v=4" alt="profile1" height="200" align="center"/>
</a>
</p>
