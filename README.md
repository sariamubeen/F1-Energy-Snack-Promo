# F1 Energy Snack Promo

This cloud computing application supports promotional activity for the launch of a new Formula One (F1) themed energy snack by GlynH’s Crisps. Users can participate in a free prize draw by visiting a URL printed on special promotional bags.

## Features

- Users can visit the provided URL and enter a 10-digit hex code, along with their name, email, and address.
- The application validates the hex code and ensures it has not been used before.
- Upon successful submission, users receive a voucher code for a discount on the next bag of the energy snack.
- 1 in 100 users may receive a voucher code for a free F1 umbrella.

## Technologies Used

- PHP
- JS
- Express.js
- MongoDB
- HTML/CSS/JavaScript

## Database Setup

The application utilizes MongoDB for its database. The MongoDB database is set up with a collection named "data". Data access is facilitated through a Node.js API, which serves data to the application's backend written in PHP.

## Automated Deployment

In the event of application failure or crash, the Docker image ensures automatic redeployment. The application is containerized using Docker, which provides isolation and portability. Thus, any instance failure will trigger automatic redeployment, ensuring seamless availability.

## Installation

1. Clone the repository:

   git clone https://gitlab.com/naumanmirza63/v-and-cc-24-cwck1-993046

2. Setup the MongoDB database with the collection named "data".

## Docker

To Dockerize the application, use the provided Dockerfile. Build the Docker image with the following command:

docker build -t f1-energy-snack-promo .

Run the Docker container with:

docker run -p 80:80 -d f1-energy-snack-promo

## Usage

1. Visit `http://localhost` in your web browser.
2. Enter the 10-digit hex code from the promotional bag, along with your name, email, and address.
3. Click on the "Submit" button to participate in the prize draw.

## Accessing Database API

The MongoDB database API is running on `localhost:3000`. The application's backend retrieves data from this API, and the results will be displayed on the browser screen.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
