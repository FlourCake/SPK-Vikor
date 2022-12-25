module.exports = {
    Index: (req, res) => {
        res.render('index');
    },

    Blank: (req, res) => {
        res.render('blank')
    },

    Input: (req, res) => {
        res.render('input')
    },

    Results: (req, res) => {
        let tempKriteria = JSON.parse(req.body.kriteria);
        let tempValues = JSON.parse(req.body.values);
        let tempNama = JSON.parse(req.body.nama);

        let data = require('../utilities/proses.js').getData(tempKriteria, tempValues, tempNama)
        res.render('results', data);
    }
}