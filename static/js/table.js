var table1;
var table2;
var rowIndex;
var lastRowIndex;
var cellIndex;
var lastCellIndex;
var lastCells;
let selectedFile;
let rowObject;

let data=[{
    "name":"jayanth",
    "data":"scd",
    "abc":"sdef"
}]

function init() {
	table1 = document.getElementById("table1");
	table2 = document.getElementById("table2");
	rowIndex = table2.rows.length;
	lastRowIndex = rowIndex - 1;
	cellIndex = table2.rows[lastRowIndex].cells.length;
	lastCellIndex = table2.rows[lastRowIndex].cells.length - 1;
	lastCells = [];

	for (const x of Array(cellIndex).keys()) {
		lastCells.push(table2.rows[lastRowIndex].cells[x]);
	}
	// lastCells = table.rows[lastRowIndex].cells[lastCellIndex]; // contains a reference to the last cell
	// alert( lastCell.innerHTML ); // alerts the cell's containing HTML, or 9
	// lastCell.remove();

	if (rowIndex <= 2)
		document.getElementById("kurang-baris").disabled = true;
	else
		document.getElementById("kurang-baris").disabled = false;

	if (cellIndex <= 2)
		document.getElementById("kurang-kolom").disabled = true;
	else
		document.getElementById("kurang-kolom").disabled = false;
}

function addBaris() {
	let node = document.createElement("tr");
	let i = 1;
	for (let index of Array(cellIndex).keys()) {
		let cell = document.createElement("td");
		let input = document.createElement("input");

		input.setAttribute("type", "text");
		input.setAttribute("id", "input-" + (rowIndex + 1) + "-" + i);
		input.setAttribute("name", "input-" + (rowIndex + 1) + "-" +  i);

		if (i == 1)
			input.setAttribute("value", "A"+ rowIndex);

		cell.appendChild(input);
		node.appendChild(cell);
		i++;
	}
	table2.tBodies[0].appendChild(node);

	init();
}

function addKolom() {
	let i = 1;
	for (let row of table1.rows) {
		let node = document.createElement("td");
		let input = document.createElement("input");
		let select = document.createElement("select");

		input.setAttribute("type", "text");
		input.setAttribute("id", "sys-" + i + "-" + (cellIndex + 1));
		input.setAttribute("name", "sys-" + i + "-" + (cellIndex + 1));

		if (i == 1) {
			input.setAttribute("value", "C" + cellIndex);
			input.disabled = true;
		}

		if (i == 2) {
			select.setAttribute("id", "sys-" + i + "-" + (cellIndex + 1));
			select.setAttribute("name", "sys-" + i + "-" + (cellIndex + 1));

			let text = ["Benefit","Cost"];

			for (let i = 0;i < 2;i++) {
				let option = document.createElement("option");
				let textNode = document.createTextNode(text[i]);

				option.setAttribute("value", text[i]);
				option.appendChild(textNode);

				select.appendChild(option);
			}

			node.appendChild(select);
		} else
			node.appendChild(input);

		row.appendChild(node);
		i++;
	}
	i = 1;
	for (let row of table2.rows) {
		let node = document.createElement("td");
		let input = document.createElement("input");

		input.setAttribute("type", "text");
		input.setAttribute("id", "input-" + i + "-" + (cellIndex + 1));
		input.setAttribute("name", "input-" + i + "-" + (cellIndex + 1));

		if (i == 1)
			input.setAttribute("value", "C" + cellIndex);

		node.appendChild(input);
		row.appendChild(node);
		i++;
	}

	init();
}

function delBaris() {
	table2.rows[lastRowIndex].remove();

	init();
}

function delKolom() {
	for (let row of table1.rows) 
		row.cells[lastCellIndex].remove();
	
	for (let row of table2.rows) 
		row.cells[lastCellIndex].remove();

	init();
}

window.onload = init();

document.getElementById('input').addEventListener("change", (event) => {
    selectedFile = event.target.files[0];
})

document.getElementById('button').addEventListener("click", () => {
    XLSX.utils.json_to_sheet(data, 'out.xlsx');
        if(selectedFile){
            let fileReader = new FileReader();
            fileReader.readAsBinaryString(selectedFile);
            fileReader.onload = (event)=>{
                let data = event.target.result;
                let workbook = XLSX.read(data,{type:"binary"});
                console.log(workbook);
                workbook.SheetNames.forEach(sheet => {
                    rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet]);
                    console.log(rowObject);
                    // document.getElementById("jsondata").innerHTML = JSON.stringify(rowObject,undefined,4)
					console.log(Object.keys(rowObject[0]));
					setTable(rowObject, Object.keys(rowObject[0]));
					// for (let x of rowObject[0].keys()) {
					// 	console.log(x);
					// }
                });
            }
        }
});

function setTable(data, keys) {
	for	(let i = -1;i < data.length;i++) {
		for	(let j = 0;j < keys.length;j++) {
			if (i == rowIndex - 1)
				addBaris();

			if (j == cellIndex)
				addKolom();

			if (i == -1) {
				document.getElementById(`input-${i+2}-${j+1}`).setAttribute("value", keys[j]);
				console.log("title", i, j);
			} else {
				document.getElementById(`input-${i+2}-${j+1}`).setAttribute("value", data[i][keys[j]]);
				console.log("cell", i, j);
			}

			// console.log(data[i].keys[j]);
		}
	}
}