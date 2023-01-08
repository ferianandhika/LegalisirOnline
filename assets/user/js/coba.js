$(function() {
  $("input[name='option']").click(function() {
    if ($("#pilihan1").is(":checked")) {
      $("#ambilsendiri").hide();
      $("#kirimpaket").show();
    } else {
      $("#ambilsendiri").show();
      $("#kirimpaket").hide();
    }

  });
});
//provinsi

  $.ajax({
    type: "POST",
    url: base_url+'api/api_rajaongkir/provinsi',
    success: function(hasil_provinsi) {
      // console.log(hasil_provinsi);
      $("select[name=provinsi").html(hasil_provinsi);
    }
  });

  //kota
  $("select[name=provinsi]").on("change", function() {
    var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

    $.ajax({
      type: "POST",
      url: base_url+'api/api_rajaongkir/kota',
      data: 'id_provinsi=' + id_provinsi_terpilih,
      success: function(hasil_kota) {
        // console.log(hasil_kota);
        $("select[name=kota").html(hasil_kota);
      }
    });

  });

  function tampil_biaya(){
      var w = $('#origin').val();
      var x = $('#kota').val();
      var y = 1000;
      var z = $('#courier').val();

      $.ajax({
          url: base_url+"api/api_rajaongkir/getCost",
          type: "POST",
          data : {origin: w, destination: x, berat: y, courier: z},
          success: function (ajaxData){
              //$('#tombol_export').show();
              //$('#hasilReport').show();
              $("#harga").html(ajaxData);
          }
      });
  };

  function bayar(id){
      $.ajax({
          url: base_url+"user/legalisir/vtweb_checkout",
          type: "POST",
          data : "id="+id,
          success: function (ajaxData){
            
          }
      });
  };

  function hitung_total_legalisir(){
    var jmlijazah = $('#jmlijazah').val();
    var jmltranskrip = $('#jmltranskrip').val();

    var harga_per_lembar = $('#harga_per_lembar').val();
    // if(jmlijazah == ""){
    //   var total = 0 + jmltranskrip;
    // }else if(jmltranskrip == ""){
    //   var total = jmlijazah + 0;
    // }else{
    //   var total = totaljml * harga_per_lembar;
    // }

    if(jmlijazah == ""){
      var totaljml = 0 + jmltranskrip;
    }else if(jmltranskrip == ""){
      var totaljml = jmlijazah + 0;
    }else{
       var totaljml = parseInt(jmlijazah) + parseInt(jmltranskrip);
    }

    var total = totaljml * harga_per_lembar;

    $('#total_legalisir').val(total);
  }
