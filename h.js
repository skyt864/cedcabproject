$(document).ready(function(){
  // $('#paragarh').hide();
// $('#bookid').hide();
$('#luggage').on('blur',function(){
if(isNaN($(this).val())){
alert('only numbers allowed');
}
});

$('select[name="cabtype"]').on('change',function(){
if ($(this).val() == 'CedMicro') {
$('.luggage').hide();
// $('#paragarh').show();
$('.luggage input').val('');
} else {
  // $('#paragarh').hide();
$('.luggage').show();
}

});


$('select[name="pickup"]').on('change',function(){
let loc = $(this).val();
let children = $('select[name="drop"]').children();
$.each(children,function(index, item){
if(item.innerText == loc){
$(this).hide();
} else {
$(this).show();
}
});
});
$('select[name="drop"]').on('change',function(){
let loc = $(this).val();
let children = $('select[name="pickup"]').children();
$.each(children,function(index, item){
if(item.innerText == loc){
$(this).hide();
} else {
$(this).show();
}
});
});
// $('select[name="pickup"]').on
// $(document).ready(function()){

// $('#drop').on('blur',function(){
// if(($(this).val())==('#pickup')){
// alert('same values not allowed');
// }
// });
// $('#calculatefare').click(function(){
//   if ( $("#bookid").is(":visible") ) { 
//     $("#calculatefare").hide(); 
//   } else if ( $("#bookid").is(":hidden") ) { 
//     $("#logo-title").show(); 
//   }
// })
$('#bookid').hide();
$( "#formm" ).submit(function( event ) {

 event.preventDefault();
 let data = new FormData(this);
 // if (pickup==drop) {
 // alert("aa");
 // return false;
 // }
 $.ajax({
  url : "fetchdata.php",
  method: "POST",
  data: data,

  contentType:false,
  processData:false,
  success: function(res){
  $('#result').html(res);
  $('#calculatefare').show();
  $('#bookid').show();
  $('input, select').focus(function(){
    $('#bookid').hide();
  })
  }
 });
});
})
