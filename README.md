# OS LOOK Traversal Grapher 

This application is a tool that was intended for students to understand how the LOOK algorithm — an algorithm in operating systems — behave. The application uses standard PHP functions to sort the order of tracks inputted by the user — in a LOOK algorithm. LOOK algorithm is an operating systems topic that is under 'disk scheduling'. For more info: https://en.wikipedia.org/wiki/LOOK_algorithm

## Getting Started

Open index.php in your server and voila.

### Prerequisites

PHP ver > 5.6

## Examples

In a user-input: 1, 3, 5, 7, 9, 10 as the tracks the disk has to traverse to read data from the HDD; given that the tracks are scheduled after the disk scheduler is in track: 4, the resulting data should be: 5, 7, 9, 10, 3, 1

### Installing

1. Download the files in this repo.
2. Extract your files in your /www or /public_html folder in your XAMPP/WAMP, or any other stack (with PHP) you're using.
3. In your directory which you've placed the files in this repository, open index.php in your browser (index.php is not necessary in your URL as long as index.php is a default in your configuration)

## Heads up
The application is pretty small, and the repository is made to showcase a school project we submitted. Because this was made in hours, there were no design patterns, object-oriented paradigm used in this application due to its size. There are comments in show.php where most of the sorting happens

## Plugins
HighCharts

## Authors

* **Jack Laurence Garay** - *Initial work* - (https://jacklaurence.net)

## License
This project is licensed under the MIT License

## Acknowledgments
Carlo Janea and Thessa Quijote for bug testing, and making sure outputs are correct.