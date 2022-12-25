const calculate = require('./functions.js')

module.exports = {
	getData(tempKriteria, tempValues, tempNama) {
		let data = {
			kriteria: [],
			values: [],
			nama: [],
			rank: []
		}

		tempKriteria.forEach(value => {
			let temp = [];
			value.forEach(isi => { temp.push(isi) });
			data.kriteria.push(temp);
		})

		tempValues.forEach(value => {
			let temp = [];
			value.forEach(isi => { temp.push(isi) });
			data.values.push(temp);
		})

		tempNama.forEach(value => {
			data.nama.push(value);
		})

		data.N = calculate.normalisasi(data.kriteria, data.values);
		data.Fstar = calculate.pembobotan(data.kriteria, data.N);
		data.S = calculate.utilityS(data.Fstar);
		data.R = calculate.regretR(data.Fstar);
		data.Splus = calculate.plus(data.S);
		data.Smin = calculate.minus(data.S);
		data.Rplus = calculate.plus(data.R);
		data.Rmin = calculate.minus(data.R);
		data.V = 0.5;
		data.dq = calculate.perankinganQ(data.S, data.R, data.V);

		for (let i = 0;i < data.nama.length;i++) {
			let temp = [];

			for (let j = 0;j < 2; j++) {
				if (j == 0)
					temp.push(data.nama[i]);
				else
					temp.push(data.dq[i]);
			}

			data.rank.push(temp);
		}

		data.rank.sort((a, b) => {
			return Math.sign(a[1] - b[1]);
		});

		return data;
	}
}