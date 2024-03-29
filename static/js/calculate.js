function calculate() {
  let table1 = document.getElementById("table1");
  let table2 = document.getElementById("table2");
  let kriteria = Array();
  let values = Array();
  let nama = Array();
  let baris = table2.rows.length;
  let kolom = table2.rows[baris-1].cells.length;

  for (let i = 2;i < 4;i++) {
    let temp = [];
    kriteria.push(temp);
    
    for (let j = 2;j <= kolom;j++)
      if (i == 2)
        kriteria[i-2].push(document.getElementById(`sys-${i}-${j}`).value);
      else
        kriteria[i-2].push(parseFloat(document.getElementById(`sys-${i}-${j}`).value));
  }

  for (let i = 2;i <= baris;i++) {
    let temp = [];
    values.push(temp);

    for (let j = 2;j <= kolom;j++) {
      // if (i == 1)
      //   values[i-1].push(document.getElementById(`input-${i}-${j}`).value);
      // else
        values[i-2].push(parseFloat(document.getElementById(`input-${i}-${j}`).value));
    }
  }

  for (let i = 2;i <= baris;i++)
      nama.push(document.getElementById(`input-${i}-${1}`).value);

  console.log(values, kriteria, nama);

  // lokasi file proses
  var getUrl = window.location;
  var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
  var redirect = `${baseUrl}results`;
  $.redirectPost(redirect, {kriteria: JSON.stringify(kriteria), values: JSON.stringify(values), nama: JSON.stringify(nama)});
}

$.extend(
{
    redirectPost: function(location, args)
    {
        var form = $('<form></form>');
        form.attr("method", "post");
        form.attr("action", location);

        $.each( args, function( key, value ) {
            var field = $('<input></input>');

            field.attr("type", "hidden");
            field.attr("name", key);
            field.attr("value", value);

            form.append(field);
        });
        $(form).appendTo('body').submit();
    }
});