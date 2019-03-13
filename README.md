# MCI website

## Setup

You need to have [Node.js](https://nodejs.org) installed first.

In the terminal install the needed packages:

`$ npm install`

For the moment being, you need to have the older version of npm 4.6.1

Check the nmp version

`npm -v`

If newer, downgrade it and run again the `npm install` command (erase the node_module folder)

`sudo npm install -g npm@4.6.1`


## Serve

Run this to start the local server and then enter the url [localhost:3000](http://localhost:3000 ) in your browser to see the website:

`$ gulp & php -S localhost:3000`