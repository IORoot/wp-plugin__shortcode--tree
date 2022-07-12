
<div id="top"></div>

<div align="center">

<img src="https://svg-rewriter.sachinraja.workers.dev/?url=https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2F%40mdi%2Fsvg%406.7.96%2Fsvg%2Fcode-array.svg&fill=%234D7C0F&width=200px&height=200px" style="width:200px;"/>

<h3 align="center">Shortcode : Tree</h3>

<p align="center">
    Obtain a random image URL based off a supplied list of image IDs
</p>    
</div>

##  1. <a name='TableofContents'></a>Table of Contents


* 1. [Table of Contents](#TableofContents)
* 2. [About The Project](#AboutTheProject)
	* 2.1. [Built With](#BuiltWith)
	* 2.2. [Installation](#Installation)
* 3. [Usage](#Usage)
	* 3.1. [Rendering](#Rendering)
	* 3.2. [CSS](#CSS)
	* 3.3. [Javascript](#Javascript)
* 4. [Troubleshooting](#Troubleshooting)
* 5. [Contributing](#Contributing)
* 6. [License](#License)
* 7. [Contact](#Contact)
* 8. [Changelog](#Changelog)


##  2. <a name='AboutTheProject'></a>About The Project

The tree shortcode is a custom function that builds a hierarchical structure of taxonomies and posts. This was used on the ParkourLabs.com website to show the logical structure of the site.

Example of the "tutorials" page on ParkourLabs.com
![https://github.com/IORoot/wp-plugin__shortcode--tree/blob/master/files/docs/triple-level.png?raw=true](https://github.com/IORoot/wp-plugin__shortcode--tree/blob/master/files/docs/triple-level.png?raw=true)

Example of the "demonstrations" page on ParkourLabs.com
![https://github.com/IORoot/wp-plugin__shortcode--tree/blob/master/files/docs/double-level.png?raw=true](https://github.com/IORoot/wp-plugin__shortcode--tree/blob/master/files/docs/double-level.png?raw=true)

<p align="right">(<a href="#top">back to top</a>)</p>



###  2.1. <a name='BuiltWith'></a>Built With

This project was built with the following frameworks, technologies and software.

* [PHP](https://php.net/)
* [Wordpress](https://wordpress.org/)
* [Composer](https://getcomposer.org/)
* [Tailwind](https://tailwindcss.com/)

<p align="right">(<a href="#top">back to top</a>)</p>




###  2.2. <a name='Installation'></a>Installation

These are the steps to get up and running with this plugin.

1. Clone the repo into your wordpress plugin folder
    ```sh
    git clone https://github.com/IORoot/wp-plugin__shortcode--tree ./wp-content/plugins/shortcode-tree
    ```
1. Composer.
    ```sh
    cd ./wp-content/plugins/shortcode-tree
    composer install
    ```

<p align="right">(<a href="#top">back to top</a>)</p>



##  3. <a name='Usage'></a>Usage

The shortcode is called `[tree]` and has a single parameter `tax` for taxonomy.

```php
[tree tax="tutorial_category"]
```

This will then render the heirarchy tree out for that particular taxonomy. 

The taxonomy can have the following three levels:

1. Parent category (level 1).
2. Child Category (level 2).
3. Post in the child Category (level 3).

or it can be only two levels.

1. Parent category (level 1).
2. Post in the parent Category (level 2).

###  3.1. <a name='Rendering'></a>Rendering

Each level has it's own PHP class that renders the output. These are located in the `./src/render/html` folder.

Depending on what level is being called will pick the correctly named class and render it specifc to how the methods describe.

###  3.2. <a name='CSS'></a>CSS

There is custom CSS for each variation used on ParkourLabs.com. One for the Demos, one for Tutorials. The CSS is the main driver for the animation and functionality of the tree.

###  3.3. <a name='Javascript'></a>Javascript

The `toggle_checkboxes.js` file listen for checkbox clicks and open the levels up.


##  4. <a name='Troubleshooting'></a>Troubleshooting
none.

<p align="right">(<a href="#top">back to top</a>)</p>

##  5. <a name='Contributing'></a>Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue.
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



##  6. <a name='License'></a>License

Distributed under the MIT License.

MIT License

Copyright (c) 2022 Andy Pearson

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

<p align="right">(<a href="#top">back to top</a>)</p>



##  7. <a name='Contact'></a>Contact

Author Link: [https://github.com/IORoot](https://github.com/IORoot)

<p align="right">(<a href="#top">back to top</a>)</p>

##  8. <a name='Changelog'></a>Changelog

v1.0.0 - initial version
