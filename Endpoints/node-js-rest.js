const express = require('express');
const cors = require('cors');
var mysql = require('mysql2');

const app = express();

app.use(cors());

var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'weba'
});

connection.connect();

app.get('/rest/get', (req, res) => {
    

    const query = 'SELECT EMAIL, NAME, SURNAME FROM users';
    connection.query(query, (error, results) => {
        if (error)
        {
            console.error('Chyba při provádění dotazu:', error);
            res.status(500).json({ error: 'Chyba při získávání dat' });
            return;
        }

        const usersData = results;

        console.log(results);

        res.json(usersData);
    });
});

app.listen(3000, () => {
    console.log('Server běží na portu 3000...');
});