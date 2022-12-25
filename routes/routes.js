const express = require('express');
const router = express.Router();
const page = require("../controllers/page.js");

router.get('/', page.Index);

router.get('/blank', page.Blank);

router.get('/input', page.Input);

router.post('/results', page.Results);

module.exports = router;