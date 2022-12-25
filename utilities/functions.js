module.exports = {
	normalisasi(a, b) {
		let c = [];

		for (let i=0;i < b.length;i++) { c.push([]) }

		let temp = [];
		let fmax = [];
		let fmin = [];
		
		for (let i=0;i < b[0].length;i++) {
			for (let j=0;j < b.length;j++) {
				temp.push(b[j][i]);
			}

			fmax.push(Math.max(...temp));
			fmin.push(Math.min(...temp));
			temp = [];
		}
		
		for (let i=0;i < b.length;i++) {
			for (let j=0; j< b[0].length;j++) {
				if (a[0][j] == "Benefit")
					c[i].push((fmax[j] - b[i][j]) / (fmax[j] - fmin[j]));
				else
					c[i].push((b[i][j] - fmin[j]) / (fmax[j] - fmin[j]));
			}
		}
		
		return c;
	},
	pembobotan(a, b) {
		for (let i=0;i < b.length;i++) {
			for (let j=0; j< b[0].length;j++)
				b[i][j] = b[i][j] * a[1][j];
		}

		return b;
	},
	utilityS(a) {
		b = [];
		temp = 0;
		for (let i=0;i < a.length;i++) {
			for (j=0;j < a[0].length;j++)
				temp = temp + a[i][j];

			b.push(temp);
			temp = 0;
		}

		return b;
	},
	regretR(a) {
		b = [];
		for (let i=0;i < a.length;i++)
			b.push(Math.max(...a[i]));

		return b;
	},
	plus(a) {
		return Math.max(...a);
	},
	minus(a) {
		return Math.min(...a);
	},
	dq(a) {
		return 1 / (a.length - 1);
	},
	perankinganQ(s, r, v) {
		q = [];
		splus = this.plus(s);
		sminus = this.minus(s);
		rplus = this.plus(r);
		rminus = this.minus(r);
		
		for (let i=0;i < s.length;i++) {
			q.push(((v * ((s[i] - sminus) / (splus - sminus))) + ((1 - v) * ((r[i] - rminus) / (rplus - rminus)))));
		}
		
		return q;
	}
}