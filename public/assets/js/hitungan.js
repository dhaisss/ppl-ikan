function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.jumlah_pinjaman.value;
two = document.autoSumForm.lama_pinjaman.value;
three = document.autoSumForm.bunga_pinjaman.value;
bunga = (one * 1) * (three /100);
total = (bunga * 1) + (one * 1);
document.autoSumForm.total_angsuran.value = (total * 1);}
function stopCalc(){
clearInterval(interval);}