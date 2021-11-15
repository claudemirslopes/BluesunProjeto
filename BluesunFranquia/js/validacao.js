$(document).ready(function(){
	$('#form_validacao').validate({
		rules:{
			// O campo Nome é de preenchimento obrigatório (required) e tamanho mínimo de 5 caracteres
			autorizado:{
				required: true,
				minlength: 5
			},
			// O campo RG é de preenchimento obrigatório (required) e tamanho mínimo de 5 caracteres
			rgrne:{
				required: true,
				minlength: 5
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 2 caracteres
			oemissor:{
				required: true,
				minlength: 2
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 6 caracteres
			dataemissao:{
				required: true,
				minlength: 6
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 5 caracteres
			cep:{
				required: true,
				minlength: 5
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 3 caracteres
			endereco:{
				required: true,
				minlength: 3
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 3 caracteres
			bairro:{
				required: true,
				minlength: 3
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 1 caracteres
			uf:{
				required: true,
				minlength: 2
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 3 caracteres
			nacao:{
				required: true
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 3 caracteres
			cidnascimento:{
				required: true,
				minlength: 3
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 1 caracteres
			ufnascimento:{
				required: true,
				minlength: 1
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 1 caracteres
			sexo:{
				required: true,
				minlength: 1
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 1 caracteres
			empresa:{
				required: true,
				minlength: 5
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 6 caracteres
			datanas:{
				required: true,
				minlength: 6
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 2 caracteres
			estcivil:{
				required: true
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 8 caracteres
			telcel:{
				required: true,
				minlength: 8
			},
			// O campo Orgao Emissor é de preenchimento obrigatório (required) e tamanho mínimo de 6 caracteres
			mae:{
				required: true,
				minlength: 6
			},
			// O campo Senha é de preenchimento obrigatório (required)
			senha: {
				required: true
			},
			// O campo Confirma Senha é de preenchimento obrigatório (required) 
			// e deve ser igual ao campo Senha (equalTo)
			repete_senha:{
				required: true,
				equalTo: "#senha"
			},
			// O campo CPF é de preenchimento obrigatório (required)
			cpf: {
				required: true
			},
			// O campo Confirma CPF é de preenchimento obrigatório (required) 
			// e deve ser igual ao campo CPF (equalTo)
			cpf2:{
				required: true,
				equalTo: "#cpf"
			},

			// O campo Termo é de preenchimento obrigatório (required) 
			termo: "required"
		},
		// Aqui fica as mensagens de erro das regras acima,
		// que serão apresentadas caso alguma regra seja desobedecida
		messages:{
			autorizado:{
				required: "O campo 'Nome' é obrigatório.",
				minlength: "O campo 'Nome' deve conter no mínimo 5 caracteres."
			},
			rgrne:{
				required: "O campo 'RG/RNE' é obrigatório.",
				minlength: "O campo 'RG/RNE' deve conter no mínimo 6 caracteres."
			},
			oemissor:{
				required: "O campo 'Orgão Emissor' é obrigatório.",
				minlength: "O campo 'Orgão Emissor' deve conter no mínimo 3 caracteres."
			},
			empresa:{
				required: "O campo 'Empresa' é obrigatório.",
				minlength: "O campo 'Empresa' deve conter no mínimo 5 caracteres."
			},
			dataemissao:{
				required: "O campo 'Data Emissáo' é obrigatório.",
				minlength: "O campo 'Data Emissáo' deve conter no mínimo 6 caracteres."
			},
			cep:{
				required: "O campo 'CEP' é obrigatório.",
				minlength: "O campo 'CEP' deve conter no mínimo 5 caracteres."
			},
			endereco:{
				required: "O campo 'Endereço' é obrigatório.",
				minlength: "O campo 'Endereço' deve conter no mínimo 3 caracteres."
			},
			bairro:{
				required: "O campo 'Bairro' é obrigatório.",
				minlength: "O campo 'Bairro' deve conter no mínimo 3 caracteres."
			},
			uf:{
				required: "Escolha um estado",
				minlength: "Mínimo 2 caracteres"
			},
			nacao:{
				required: "O campo 'Nação' é obrigatório.",
			},
			cidnascimento:{
				required: "O campo 'Cidade de Nascimento' é obrigatório.",
				minlength: "O campo 'Cidade de Nascimento' deve conter no mínimo 3 caracteres."
			},
			ufnascimento:{
				required: "O campo 'Estado de Nascimento' é obrigatório.",
				minlength: "O campo 'Estado de Nascimento' deve conter no mínimo 1 caracteres."
			},
			sexo:{
				required: "O campo 'Sexo' é obrigatório.",
				minlength: "O campo 'Sexo' deve conter no mínimo 1 caracteres."
			},
			datanas:{
				required: "O campo 'Data de Nascimento' é obrigatório.",
				minlength: "O campo 'Data de Nascimento' deve conter no mínimo 6 caracteres."
			},
			estcivil:{
				required: "O campo 'Estado Civil' é obrigatório."
			},
			telcel:{
				required: "O campo 'Telefone Celular' é obrigatório.",
				minlength: "O campo 'Telefone Celular' deve conter no mínimo 8 caracteres."
			},
			celular:{
				required: "O campo 'Telefone Celular' é obrigatório.",
				minlength: "O campo 'Telefone Celular' deve conter no mínimo 8 caracteres."
			},
			email: {
				required: "O campo Email é obrigatório.",
				email: "O campo Email deve conter um email válido."
			},
			mae:{
				required: "O campo 'Mãe' é obrigatório.",
				minlength: "O campo 'Mãe' deve conter no mínimo 6 caracteres."
			},
			time:{
				required: "É necessário selecionar o seu time favorito."
			},
			obs:{
				required: "O campo Observação é obrigatório.",
				minlength: "O campo Observação deve conter no mínimo 3 caracteres.",
				maxlength: "O campo Observação deve conter no máximo 10 caracteres."
			},
			senha: {
				required: "O campo 'Senha de acesso' é obrigatório."
			},
			repete_senha:{
				required: "O campo 'Repita a senha digitada' é obrigatório.",
				equalTo: "O campo 'Repita a senha digitada' deve ser idêntico ao campo 'Senha'."
			},
			cpf: {
				required: "O campo 'CPF' é obrigatório."
			},
			cpf2:{
				required: "O campo 'Repita o seu CPF' é obrigatório.",
				equalTo: "O campo 'Repita o seu CPF' deve ser idêntico ao campo 'CPF'."
			},
			termo: "É necessário aceitar os termos de uso."
		}

	});
});