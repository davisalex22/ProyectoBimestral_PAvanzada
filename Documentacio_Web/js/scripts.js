$(document).ready(function(){

    $(':input').on('change', function(){
        let id = $(this).attr('id');
        let html = '';
        let valor;
        switch (id){
            case 'cuadrado':
                valor = $(this).val();
                html += `Funcion: ${valor}x^2`;
            break;
            case 'signo1':
                valor = $(this).val();
                var contenido = $('#su_funcion').text();
                html = `${contenido} ${valor}`;
                $('#su_funcion').append(html)
                
            break;
            case 'uno':
                valor = $(this).val();
                var contenido = $('#su_funcion').text();
                html = `${contenido} ${valor}X`;
                $('#su_funcion').append(html)
            break;
            case 'signo2':
                valor = $(this).val();
                var contenido = $('#su_funcion').text();
                html = `${contenido} ${valor}`;
                $('#su_funcion').append(html)
            break;
            case 'solo':
                valor = $(this).val();
                var contenido = $('#su_funcion').text();
                html = `${contenido} ${valor}`;
                $('#su_funcion').append(html)
            break;

        }
        $('#su_funcion').html(html);
    });

    $('#graficar').on('click', function(){
		let cuadrado = parseInt($('#cuadrado').val());
		let signo1 = $('#signo1').val();
		let uno = parseInt($('#uno').val());
		let signo2 = $('#signo2').val();
		let solo = parseInt($('#solo').val());

		if(cuadrado && signo1 && uno && signo2 && solo){
			let html = `Funcion : ${cuadrado}X2 ${signo1} ${uno}X ${signo2} ${solo}`;
            let valoresy = `
                <tr>
                    <th>Y</th>
            `;
            let valoresx = `
                <tr>
                    <th>X</th>
            `;
            let valores = '';
			for (var i = -4; i <= 4; i++) {
				let valor1 = cuadrado * Math.pow(i,2); 
				let valor2 = uno * i;
				let valor3 = solo;
				let y; 
				if(signo1 === '+' && signo2 === '-'){
					y = valor1 + valor2 - valor3;
				}else if(signo1 === '+' && signo2 === '+'){
					y = valor1 + valor2 + valor3;
				}else if(signo1 === '-' && signo2 === '+'){ 
					y = valor1 - valor2 + valor3;
				}else if(signo1 === '-' && signo2 === '-'){
					y = valor1 - valor2 - valor3;
				}
                // let y = cuadrado*Math.pow(i, 2);
                valoresx += `
                    <td>${i}</td>
                `;
                valoresy += `
                    <td>${y}</td>
                `;
                // valores += `
				// 	<tr>
				// 		<td>${i}</td>
				// 		<td>${y}</td>
				// 	</tr>
				// `;
            }
            valoresx += `</tr>`;
            valoresy += `</tr>`;
            console.log(valoresy);
            valores = `
                ${valoresx} 
                ${valoresy}
            `;

			$('.graficas').show('slow');
			$('#añadirValores').append(valores);
		}else{
            $('.errores_funcion').show('slow');
            
            setTimeout(function(){
                $('.errores_funcion').hide('slow');
            }, 3000)
		}
	});
   
    




    //**Derivar  funcion  */

    $('#derivar').on('click', function(){
		//obtenemos los valores de los inputs y los guardamos en las variables
		let cubo = parseInt($('#der_cubo').val());
		let signo1 = $('#der_signo1').val();
		let cuadrado = parseInt($('#der_cuadrado').val());
		let signo2 = $('#der_signo2').val();
		let uno = parseInt($('#der_uno').val());
		let signo3 = $('#der_signo3').val();
		let solo = parseInt($('#der_solo').val());
		let exponente3 = 3;
        let exponente2 = 2;
        let html = '';
		
		if(cubo && signo1 && cuadrado && signo2 && uno && signo3 && solo){
			let funcion_puesta = `<b>Funcion Inicial:</b> ${cubo}x${exponente3} ${signo1} ${cuadrado}x${exponente2} ${signo2} ${uno}x ${signo3} ${solo}`;

			let der_cuadrado = cubo * exponente3;
			let der_uno = cuadrado * exponente2;
            let der_solo = uno;
            html += `<h3>Primero se multiplica los exponentes por la base</h3> 
                <p>(${cubo}* ${exponente3})X${exponente3} ${signo1} (${cuadrado} * ${exponente2})X${exponente2} ${signo2} (${uno} * 1 )X${signo3} ${solo}</p>
                <p>${der_cuadrado}x${exponente3} ${signo1} ${der_uno}x${exponente2} ${signo2} ${uno}X</p>
                <h3>Luego se le resta uno al exponente</h3>
                <p>${der_cuadrado}X(${exponente3} - 1)${signo1} ${der_uno}X(${exponente2} - 1)${signo2} ${der_solo}</p>
            `;
			exponente3 -= 1;
			exponente2 -= 1;
			if(exponente2 == 1){
				exponente2 = "";
			}
			html += `<p><b>Resultado:</b> ${der_cuadrado}X${exponente3} ${signo1} ${der_uno}X${exponente2} ${signo2} ${der_solo} </p>`;
							

			$('#funcion_puesta').html(funcion_puesta);
			$('#derivada').html(html);
		}else{
            $('.errores_derivar').show('slow');
            setTimeout(function(){
                $('.errores_derivar').hide('slow');
            }, 3000)
		}
		
		
	})
    
});