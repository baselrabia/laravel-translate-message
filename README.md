
[![Issues](https://img.shields.io/github/issues/baselrabia/laravel-translate-message.svg?style=flat-square)](https://github.com/baselrabia/laravel-translate-message/issues)
[![Stars](https://img.shields.io/github/stars/baselrabia/laravel-translate-message.svg?style=flat-square)](https://github.com/baselrabia/laravel-translate-message/stargazers)
[![Latest Version](https://img.shields.io/github/tag/baselrabia/laravel-translate-message.svg?style=flat-square&label=release)](https://github.com/baselrabia/laravel-translate-message/tags)
[![Software License](https://img.shields.io/github/license/baselrabia/laravel-translate-message.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/baselrabia/laravel-translate-message.svg?style=flat-square)](https://packagist.org/packages/baselrabia/laravel-translate-message)

 
<p align="center">
      <img src="https://user-images.githubusercontent.com/59374587/95769432-3c361a00-0c8e-11eb-8ce7-9ee9a66f32af.png" width="10%" alt="Happy Logo"/>
</p>

<h1 align="center">Laravel Translate Message 🥳</h1>


This package provides new helper functions that take care of handling all the translation hassle and do it for you.


## Installation
Begin by installing this package through Composer. Just run following command to terminal-

```php
composer require baselrabia/laravel-translate-message
```
 
## What Is New Here 🤔

In this package, you will be provided by two new Helper function 

```php
// two underscore and t function 
__t("Tranlation Word");
// three underscore Function 
___("Tranlation Word");
```
This Two helpers is a wrapper around the laravel helper `trans()` , `__()` that offer the translation of text from the lang file resource `resource/lang/en/app.php` </br>
### What Happen Then !!
our helpers allow you to write your message once when you call the function and it will translate it for you automatically and write there translating in `resources/lang` folder so if you would like to change the automated translation you can edit them there. </br>


***As you see it takes the hassle of going to every `/lang/..` folder to write the translation for specific lang***


## Contributing
If you think something important is missing or should be different based on your experience, I'd love to hear it!  If you have suggestions for improving this package, open an issue with your suggestion.

 


<h2 align="center">How to Contribute 💪</h2>

   ```
   - Fork the project 

   - Create a new branch with your changes:
   $ git checkout -b my-feature

   - Save your changes and create a commit message telling you what you did:
   $ git commit -m "feature: My new feature"

   - Submit your changes:
   $ git push origin my-feature
   ```


<h2 align="center">License 📝</h2>

<p align="center">
   This repository is under MIT license. You can see the <a href="https://github.com/baselrabia/laravel-translate-message/blob/master/LICENSE.TXT">LICENSE</a> file for more details. 😉
</p>

---

 
   >This project was developed with ❤️ by **[@Basel Rabia](https://www.linkedin.com/in/baselrabia/)** <br> 
   If it helped you, give it ⭐, it will help me too 😉 

 

   <div align="center">

   [![Linkedin Badge](https://img.shields.io/badge/-Basel%20Rabia-292929?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/baselrabia/)](https://www.linkedin.com/in/baselrabia/)

   </div>
   