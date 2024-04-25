const express = require('express');
const bodyParser = require('body-parser');
const { MongoClient } = require('mongodb');

const app = express();
const port = 3000;

// MongoDB connection URI
const uri = "mongodb+srv://mirza:mirza@f1energysnackpromo.nrpwssm.mongodb.net/?retryWrites=true&w=majority&appName=f1energysnackpromo";
const dbName = "f1promo";
const collectionName = "data";

// Connect to MongoDB
let db;
MongoClient.connect(uri, { useNewUrlParser: true, useUnifiedTopology: true })
    .then(client => {
        console.log('Connected to MongoDB');
        db = client.db(dbName);
    })
    .catch(err => {
        console.error('Error connecting to MongoDB:', err);
    });

// Middleware to parse request body
app.use(bodyParser.urlencoded({ extended: true }));

// Endpoint to redeem the hex code
app.post('/redeemCode', async (req, res) => {
    const { hexCode, name, email, address } = req.body;

    try {
        // Check if hex code is already redeemed
        const isRedeemed = await isCodeRedeemed(hexCode);
        if (isRedeemed) {
            res.send("Hex code is already redeemed.");
            return;
        }

        // Fetch the vCode from the database
        const vCode = await getVCodeFromDB(hexCode);

        if (!vCode) {
            res.send("Hex code does not exist.");
            return;
        }

        // Store the redeemed code details in MongoDB
        await redeemCode(hexCode, name, email, address, vCode);

        // Send success message
        res.send("Redemption successful. vCode: " + vCode);
    } catch (error) {
        console.error('Error redeeming code:', error);
        res.status(500).send("Internal server error.");
    }
});

// Function to check if hex code is already redeemed
async function isCodeRedeemed(hexCode) {
    const collection = db.collection(collectionName);
    const document = await collection.findOne({ hexCode: hexCode });
    return !!document && !!document.email; // Check if document exists and has an email
}

// Function to fetch the vCode from the database
async function getVCodeFromDB(hexCode) {
    // Fetch the vCode from the database
    const collection = db.collection(collectionName);
    const document = await collection.findOne({ hexCode: hexCode });
    return document ? document.vCode : null;
}

// Function to store the redeemed code details in MongoDB
async function redeemCode(hexCode, name, email, address, vCode) {
    const collection = db.collection(collectionName);
    await collection.insertOne({
        hexCode: hexCode,
        name: name,
        email: email,
        address: address,
        vCode: vCode
    });
}

// Start the server
app.listen(port, () => {
    console.log(`Server listening at http://localhost:${port}`);
});
