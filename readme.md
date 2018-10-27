# Baseproject

[![pipeline status](https://git.substrakt.com/internal/baseproject/badges/master/pipeline.svg)](https://git.substrakt.com/internal/baseproject/commits/master) [![coverage report](https://git.substrakt.com/internal/baseproject/badges/master/coverage.svg)](https://git.substrakt.com/internal/baseproject/commits/master)

Baseproject brings modern development techniques to WordPress development, using dependency management.

## Requirements
- [PHP](https://php.net)
- [Composer](https://getcomposer.org)
- [Node](https://nodejs.org)
- [NPM](https://www.npmjs.com)
- [Yarn](https://yarnpkg.com)
- [Gulp](https://gulpjs.com)

### Installation
**Composer**
```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
```

**Node, NPM, and Yarn**
```sh
brew update; brew install node yarn;
```
_NPM will be installed when you install Node._


**MAMP Users**

A custom .htaccess file has been added for you so the `public`
directory will be served correctly on `localhost/project-name`.

If you're using MAMP with apache proceed as normal.

**Valet Users**

Valet users will need a custom driver to rewrite requests into `public`.

Take this file [WordPressMultisiteValetDriver.php](https://github.com/fewagency/best-practices/blob/master/Wordpress/WordPressMultisiteValetDriver.php)  and add it to your `~/.valet/Drivers/` directory. No restart required.


### Getting Started
First clone done the Baseproject repo, renaming it to match your project
```sh
composer create-project substrakt/baseproject --repository=https://composer.substrakt.com <projectName>
```
When composer asks to delete the VCS history make sure to say yes
```sh
Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]? y
```
Now change directory into the project and intialise a new git repo.
```sh
git init
```
Add your origin remote.
```sh
git remote add origin <originUrl>
```
From this point you can start you should make a commit and push up to origin.
```sh
git add --all
git commit -m "ADD: Initial project files"
```

## Sass and JavaScript
A gulp file `gulpfile.js` is setup in the root of the Basetheme. There are a few default tasks to help development.

### Installation
```
yarn global add gulp-cli
```

### Getting Started
```
yarn install
yarn gulp
```
This will run the default task which is.
```
gulp.task('watch:all', ['watch:js', 'watch:sass', 'watch:images', 'watch:fonts'])
```
This task watches for any changes to JavaScript, Sass, font, and images within side `childtheme/assets/src` runs tasks on them and places the results in the corresponding folder inside `childtheme/assets/build`.

Tasks include 
- Sass compilation
- Sass compression
- JavaScript prettifying
- JavaScript minifying
- JavaScript concatenation
- Image compression

### Deploying

In order for heroku to build the javascript and sass files you'll need to setup two buildpacks in order. (-i 1 makes sure that nodejs runs first)

```sh
heroku buildpacks:add -i 1 heroku/nodejs
heroku buildpacks:add heroku/php
```

#### Enqueues inside Childtheme
As standard both the compressed, concatenated JavaScript, and Sass file is enqueued inside `childtheme/hooks/enqueues.php`.

More documentation to follow.
