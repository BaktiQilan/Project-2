function generate(){
    var element = document.getElementById("barcode");
    JsBarcode(element, document.getElementsByName("namabarang")[0].value + "123", {
        height: 100
      });
}

