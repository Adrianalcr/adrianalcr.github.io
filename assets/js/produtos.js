var app = window.app || {},
business_paypal = ''; //Código do paypal

(function($){
    'use strict';

    app.init = function(){
        //Total de Itens no carrinho.

        var total = 0,
        items = 0

        var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []};

        if (undefined != cart.items && cart.items !== null && cart.items  != '' && cart.items.length > 0){
            _.forEach(cart.items, function(n, key) {
                items = (items + n.qnt)
                total = total + (n.qnt * n.preco)
            });
        }

        $('#totalItems').text(items)
        $('.totalAmount').text('R$' +total+ 'BRL')
    }

    app.createProdutos = function(){
        var produtos = [
            {
                id : 1,
                img : './assets/images/produtos/1.png',
                nome : 'Travel 01',
                preco : 25.00,
                desc : 'Site para vendas de passagens aereas...',
                estoque : 0
            },
            {
                id : 2,
                img : './assets/images/produtos/1.png',
                nome : 'Travel 02',
                preco : 25.00,
                desc : 'Site para vendas de passagens aereas...',
                estoque : 4
            },
            {
                id : 3,
                img : './assets/images/produtos/1.png',
                nome : 'Travel 03',
                preco : 25.00,
                desc : 'Site para vendas de passagens aereas...',
                estoque : 5
            },
            {
                id : 4,
                img : 'http://libertadproof.com/wp-content/uploads/2016/02/87952_Obv.jpg',
                nome : 'Travel 04',
                preco : 25.00,
                desc : 'Site para vendas de passagens aereas...',
                estoque : 0
            }
        ],
        wrapper = $('.produtosWrapper'),
        conteudo = ''

        for(var i = 0; i < produtos.length; i++){
            if(produtos[i].estoque > 0){
                conteudo+= '<div class="coin-wrapper">'
                conteudo+= '    <img src="'+produtos[i].img+'" alt="'+produtos[i].nome+'">'
                conteudo+= '    <span class="large-12 columns produto-detalhes">'
                conteudo+= '        <h3>'+produtos[i].nome+'<span class="preco"> R$' +produtos[i].preco+' BRL</span></h3>'
                conteudo+= '        <h3>Estoque:<span class="estoque">'+produtos[i].estoque+' BRL</span></h3>'
                conteudo+= '    </span>'
                conteudo+= '    <a class="large-12 columns btn submit ladda-button prod-'+produtos[i].id+'" data-style="slide-right" onclick="app.addtoCart('+produtos[i].id+');">Adicionar no Carrinho</a>'
                conteudo+= '    <div class="clearfix"></div>'
                conteudo+= '</div>'
            }
        }

        wrapper.html(conteudo)

        localStorage.setItem('produtos',JSON.stringify(produtos))
    }

    app.addtoCart = function(id){
        var l = Ladda.create( document.querySelector( '.prod-'+id ) );

        l.start();
        var produtos = JSON.parse(localStorage.getItem('produtos')),
        produtos = _.find(produtos,{ 'id': id }),
        qnt = 1

        if(qnt <= produtos.estoque){
            if(undefined != produtos){
                if(qnt > 0){
                    setTimeout(function(){
                        var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []};
                        app.searchProd(cart,produtos.id,parseInt(qnt),produtos.nome,produtos.preco,produtos.img,produtos.estoque)
                        l.stop();
                    }, 2000)
                }else{
                    alert('Você precisa adicionar um item no carrinho')
                }
            }else{
                alert('Ops! algo errado aconteceu, tente novamente mais tarde')
            }
        }else{
            alert('Este produto não pode mais ser adicionado')
        }
    }

    app.searchProd = function(cart,id,qnt,nome,preco,img,acessivel){
        var curProd = _.find(cart.items, { 'id': id })

        if(undefined != curProd && curProd != null){
            if(curProd.qnt < acessivel){
                curProd.qnt = parseInt(curProd.qnt + qnt)
            }else{
                alert('Este produto não pode mais ser adicionado')
            }
        }else{
            var prod = {
                id : id,
                qnt : qnt,
                nome : nome,
                preco : preco,
                img : img,
                acessivel : acessivel
            }
            cart.items.push(prod)
        }
        localStorage.setItem('cart',JSON.stringify(cart))
        app.init()
        app.getProdutos()
        app.updatePayForm()
    }

    app.getProdutos = function(){
        var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []},
        msg = '',
        wrapper = $('.cart'),
        total = 0
        wrapper.html('')

        if(undefined == cart || null == cart || cart == '' || cart.items.length ==0){
            wrapper.html('<li> Seu carrinho está vazio</li>');
            $('.cart').css('left','-400%')
        }else{
            var items = '';
            _.forEach(cart.items, function(n, key){

                total = total + (n.qnt * n.preco)
                items += '<li>'
                items += '<img src="'+n.img+'" />'
                items += '<h3 class="titulo">'+n.nome+'<br><span class="preco">'+n.qnt+' x R$ '+n.preco+' BRL</span> <button class="add" onclick="app.updateItem('+n.id+','+n.acessivel+')"><i class="icon ion-minus-circled"></i></button> <button onclick="app.deleteProd('+n.id+')"><i class="icon ion-close-circled"></i></button><div class="clearfix"></div></h3>'
                items += '</li>'
            });

            items += '<li id="total">Total: R$ '+total+' BRL <div id="submitForm"></div></li>'
            wrapper.html(items)
            $('cart').css('left','-500%')
        }
    }

    app.updateItem = function(id,acessivel){
        var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []},
        curProd = _.find(cart.items, { 'id' : id })
        curProd.qnt = curProd.qnt -1;
        if(curProd.qnt > 0){
            localStorage.setItem('cart',JSON.stringify(cart))
            app.init()
            app.getProdutos()
            app.updatePayForm()
        }else{
            app.deleteProd(id,true)
        }
    }

    app.delete = function(id){
        var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []};
        var curProd = _.find(cart.items, { 'id' : id })
        _.remove(cart.items, curProd);
        localStorage.setItem('cart',JSON.stringify(cart))
        app.init()
        app.getProdutos()
        app.updatePayForm()
    }

    app.deleteProd = function(id,remove){
        if(undefined != id && id > 0){

            if(remove == true){
                app.delete(id)
            }else{
                var conf = confirm('Deseja excluir este produto?')
                if(conf){
                    app.delete(id)
                }
            }
        }
    }

    app.updatePayForm = function(){
        var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []};
        var statics = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_cart"><input type="hidden" name="upload" value="1"><input type="hidden" name="currency_code" value="USD" /><input type="hidden" name="business" value="'+business_paypal+'">',
        dinamic = '',
        wrapper = $('#submitForm')

        wrapper.html('')

        if(undefined != cart && null != cart && cart != ''){
			var i = 1;
			_.forEach(cart.items, function(prod, key) {
					dinamic += '<input type="hidden" name="item_name_'+i+'" value="'+prod.nome+'">'
					dinamic += '<input type="hidden" name="amount_'+i+'" value="'+prod.preco+'">'
					dinamic += '<input type="hidden" name="item_number_'+i+'" value="'+prod.id+'" />'
					dinamic += '<input type="hidden" name="quantity_'+i+'" value="'+prod.qnt+'" />'
				i++;
			})

			statics += dinamic + '<button type="submit" class="pay">Pagar &nbsp;<i class="ion-chevron-right"></i></button></form>'

			wrapper.html(statics)
		}
    }

    $(document).ready(function(){
        app.init()
        app.getProdutos()
        app.updatePayForm()
        app.createProdutos()
    })

})(jQuery)