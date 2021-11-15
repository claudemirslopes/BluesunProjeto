$("input[name='cpf']").on('blur', function(){
  var cpf = $(this).val();
  $.get('validacoes/dadosuniq.php?cpf=' + cpf,function(data){
    $('#resultadocpf').html(data);
  });
});

$("input[name='email']").on('blur', function(){
  var email = $(this).val();
  $.get('validacoes/dadosuniq.php?email=' + email,function(data){
    $('#resultadoemail').html(data);
  });
});

$("input[name='rgrne']").on('blur', function(){
  var rgrne = $(this).val();
  $.get('validacoes/dadosuniq.php?rgrne=' + rgrne,function(data){
    $('#resultadorg').html(data);
  });
});