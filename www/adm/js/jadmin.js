dummy = $('<div class="dummy bg-secondary rounded"></div>');
pos = 0;
dragged = null;
elemover = null;
activecont = null;
$(document).ready(function(){

	$(document).on('click', '.mdel', function(e) {
	 	e.preventDefault()
	 	var del = confirm("Точно удалить?");
	 	if(del==true)
	 	{
	 		href = $(this).attr('href');
	 		window.location.replace(href);
	 	}
		
	});

	$(".cont").mousemove(function(event){
	pos = event.pageY - activecont.offset().top;
	if(dragged){
		activecont.children(".elemcont").each(function(i,e){
			ethistop = $(e).offset().top - $(e).parent().offset().top;
			ethisbot = $(e).offset().top + Math.floor($(e).outerHeight()) - $(e).parent().offset().top;
			if(pos >= ethistop && pos <=ethisbot){
				elemover = $(e);
			}
		});
	}					
		if(elemover && dragged){
			thistop = elemover.offset().top - $(this).offset().top;
			thismid = elemover.offset().top + Math.floor(elemover.outerHeight()/2) - $(this).offset().top;
			thisbot = elemover.offset().top + Math.floor(elemover.outerHeight()) - $(this).offset().top;
			if(pos >= thistop && pos <=thismid){
				dummy.detach();
				elemover.before(dummy);
			}
			if(pos > thismid && pos <=thisbot){
				dummy.detach();
				elemover.after(dummy);
			}
		}
		if(dragged && pos >= (dragged.outerHeight()/2) && pos <= (activecont.outerHeight() - dragged.outerHeight()/2)){
			dragged.css({"top":(pos - Math.floor(dragged.outerHeight()/2))+"px"});
		}
	});
	$(".slides").slideUp(0);
/*	$(".header").click(function(){
		if($(this).children("i").hasClass('fa-folder'))$(this).children("i").attr('class','fa fa-folder-open fa-fw');
		else $(this).children("i").attr('class','fa fa-folder fa-fw');
		$(this).parent().children(".slides").toggle(100);
		if($(this).parent().children(".slides").attr('loaded') == '0'){
			var el = $(this);
			$.post('/engine/scripts/group.php',{parms:el.parent().children(".slides").children('.parms').html()},function(data){
				el.parent().children(".slides").html(data);
				el.parent().children(".slides").attr('loaded','1');
			});			
		}
	});
	*/
	$(".elemcont").mousedown(function(){
		dragged = $(this);
		dummy.css({"height":dragged.outerHeight()+"px"});
		dragged.removeClass('elemcont');
		dragged.addClass('dragged');
		dragged.after(dummy);
		activecont = dragged.parent();
	});
	$(window).mouseup(function(){
		dragged.detach();
		dragged.addClass('elemcont');
		dragged.removeClass('dragged');
		dummy.after(dragged);
		dummy.detach();
		dragged = null;
		activecont.children(".elemcont").each(function(i,e){
			$(e).children(".elem").attr('order',i+1);
			if($(e).children(".elem").attr('slider')) $.post('/adm/js/update.php',{table:table+'_slider',id:$(e).children(".elem").attr('id'),ord:(i+1)});
			else $.post('/adm/js/update.php',{table:table,id:$(e).children(".elem").attr('id'),ord:(i+1)});
		});
		activecont = null;
	});
	$(".nomove").mousedown(function(){return false;});
});

function group(ths)
{
	if($(ths).children("i").hasClass('fa-folder'))$(ths).children("i").attr('class','fa fa-folder-open fa-fw');
	else $(ths).children("i").attr('class','fa fa-folder fa-fw');
	$(ths).parent().children(".slides").toggle(100);
	if($(ths).parent().children(".slides").attr('loaded') == '0'){
		var el = $(ths).parent().children(".slides");
		$.post('/adm/scripts/group.php',{parms:el.children('.parms').html()},function(data){
			el.html(data);
			el.attr('loaded','1');
			el.children(".cat").children(".slides").slideUp(0);

			el.children(".elemcont").mousedown(function(){
				dragged = $(this);
				dummy.css({"height":dragged.outerHeight()+"px"});
				dragged.removeClass('elemcont');
				dragged.addClass('dragged');
				dragged.after(dummy);
				activecont = dragged.parent();
			});

			el.mousemove(function(event){
				pos = event.pageY - activecont.offset().top;
				if(dragged){
					activecont.children(".elemcont").each(function(i,e){
						ethistop = $(e).offset().top - $(e).parent().offset().top;
						ethisbot = $(e).offset().top + Math.floor($(e).outerHeight()) - $(e).parent().offset().top;
						if(pos >= ethistop && pos <=ethisbot){
							elemover = $(e);
						}
					});
				}					
				if(elemover && dragged){
					thistop = elemover.offset().top - $(this).offset().top;
					thismid = elemover.offset().top + Math.floor(elemover.outerHeight()/2) - $(this).offset().top;
					thisbot = elemover.offset().top + Math.floor(elemover.outerHeight()) - $(this).offset().top;
					if(pos >= thistop && pos <=thismid){
						dummy.detach();
						elemover.before(dummy);
					}
					if(pos > thismid && pos <=thisbot){
						dummy.detach();
						elemover.after(dummy);
					}
				}
				if(dragged && pos >= (dragged.outerHeight()/2) && pos <= (activecont.outerHeight() - dragged.outerHeight()/2)){
					dragged.css({"top":(pos - Math.floor(dragged.outerHeight()/2))+"px"});
				}
			});
			el.children(".elemcont").children(".elem").children(".nomove").mousedown(function(){return false;});
		});			
	}	
}

/*Загрузка товаров в склад 1*/
running1 = false;

function load1_init()
{
	$.get('/load/sklad1/running.txt?r='+Math.floor(Math.random()*10000),function(data){
		if(data == '1'){
			$('#inf').html('В данный момент загрузка выполняется');
			$('#inf').attr('class','alert alert-success');
			running1 = true;
			$("#stopit").removeAttr('disabled');
		}
		else{
			$("#load").removeAttr('disabled');
			$("#clearload").removeAttr('disabled');			
			$('#inf').html('В данный момент загрузка не выполняется');
			$('#inf').attr('class','alert alert-danger');
		}
		get_values1();
	});
}

function get_values1()
{
	var ver = Math.floor(Math.random()*10000);
	$.get('/load/sklad1/running.txt?r='+ver,function(data){
		if(data == '1' && !running1)
		{
			running1 = true;
			$('#inf').html('В данный момент загрузка выполняется');
			$('#inf').attr('class','alert alert-success');
			$("#stopit").removeAttr('disabled');
			$("#load").attr('disabled','true');
			$("#clearload").attr('disabled','true');			
		}
		else if(data == '0' && running1){
			running1 = false;
			$("#load").removeAttr('disabled');
			$("#clearload").removeAttr('disabled');			
			$('#inf').html('В данный момент загрузка не выполняется');
			$('#inf').attr('class','alert alert-danger');
			$("#stopit").attr('disabled','true');
		}
	});
	if(running1){
		$.get('/load/sklad1/total.txt?r='+ver,function(data){
			$("#total").html(data);
		});
		$.get('/load/sklad1/count.txt?r='+ver,function(data){
			$("#count").html(data);
		});
		$.get('/load/sklad1/percent.txt?r='+ver,function(data){
			$("#progr").attr('style','width: '+data+'%');
			$("#progr").attr('aria-valuenow',data);
			$("#progr").html(data+'%');
		});
	}
	$('body').animate({opacity:1},3000,function(){
		get_values1();
	});
}

function load1_stop()
{
	running1 = false;
	$.get('/load/sklad1/stopit.php?v=1',function(){
		$("#load").removeAttr('disabled');
		$("#clearload").removeAttr('disabled');
		$("#stopit").attr('disabled','true');
		$("#progr").attr('style','width: 0%');
		$("#progr").attr('aria-valuenow','0');
		$("#progr").html('');
		$('#inf').html('В данный момент загрузка не выполняется');
		$('#inf').attr('class','alert alert-danger');
		$("#total").html('0');
		$("#count").html('0');
	});
}

function load1_begin($clear)
{
	var dop = '';
	if($clear){
		dop = '?clear=1';
	}
	$('#inf').html('Идет загрузка и распаковка архива... <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');
	$('#inf').attr('class','alert alert-warning');
	$("#load").attr('disabled','true');
	$("#clearload").attr('disabled','true');
	$.get('/load/sklad1/stopit.php?v=2',function(data){	
		$.get('/load/sklad1/loadzip.php',function(data){
			if(data == 'ok'){
				$("#load").attr('disabled','true');
				$("#clearload").attr('disabled','true');
				$("#stopit").removeAttr('disabled');
				$.get('/load/sklad1/load.php'+dop);
			}
			else{
				$('#inf').html('Ошибка при загрузке и распаковке архива...');
				$('#inf').attr('class','alert alert-danger');
				$("#load").removeAttr('disabled');
				$("#clearload").removeAttr('disabled');			
			}
		});
	});
}

/*Загрузка товаров в склад 2*/
running = false;

function load2_init()
{
	$.get('/load/sklad2/running.txt?r='+Math.floor(Math.random()*10000),function(data){
		if(data == '1'){
			$('#inf').html('В данный момент загрузка выполняется');
			$('#inf').attr('class','alert alert-success');
			running = true;
			$("#stopit").removeAttr('disabled');
		}
		else{
			$("#load").removeAttr('disabled');
			$("#clearload").removeAttr('disabled');			
			$('#inf').html('В данный момент загрузка не выполняется');
			$('#inf').attr('class','alert alert-danger');
		}
		get_values();
	});
}

function get_values()
{
	var ver = Math.floor(Math.random()*10000);
	$.get('/load/sklad2/running.txt?r='+ver,function(data){
		if(data == '1' && !running)
		{
			running = true;
			$('#inf').html('В данный момент загрузка выполняется');
			$('#inf').attr('class','alert alert-success');
			$("#stopit").removeAttr('disabled');
			$("#load").attr('disabled','true');
			$("#clearload").attr('disabled','true');			
		}
		else if(data == '0' && running){
			running = false;
			$("#load").removeAttr('disabled');
			$("#clearload").removeAttr('disabled');			
			$('#inf').html('В данный момент загрузка не выполняется');
			$('#inf').attr('class','alert alert-danger');
			$("#stopit").attr('disabled','true');
		}
	});
	if(running){
		$.get('/load/sklad2/total.txt?r='+ver,function(data){
			$("#total").html(data);
		});
		$.get('/load/sklad2/count.txt?r='+ver,function(data){
			$("#count").html(data);
		});
		$.get('/load/sklad2/percent.txt?r='+ver,function(data){
			$("#progr").attr('style','width: '+data+'%');
			$("#progr").attr('aria-valuenow',data);
			$("#progr").html(data+'%');
		});
	}
	$('body').animate({opacity:1},3000,function(){
		get_values();
	});
}

function load2_stop()
{
	running = false;
	$.get('/load/sklad2/stopit.php?v=1',function(){
		$("#load").removeAttr('disabled');
		$("#clearload").removeAttr('disabled');
		$("#stopit").attr('disabled','true');
		$("#progr").attr('style','width: 0%');
		$("#progr").attr('aria-valuenow','0');
		$("#progr").html('');
		$('#inf').html('В данный момент загрузка не выполняется');
		$('#inf').attr('class','alert alert-danger');
		$("#total").html('0');
		$("#count").html('0');
	});
}

function load2_begin($clear)
{
	var dop = '';
	if($clear){
		dop = '?clear=1';
	}
	$('#inf').html('Идет загрузка и распаковка архива... <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');
	$('#inf').attr('class','alert alert-warning');
	$("#load").attr('disabled','true');
	$("#clearload").attr('disabled','true');
	$.get('/load/sklad2/stopit.php?v=2',function(data){	
		$.get('/load/sklad2/loadzip.php',function(data){
			if(data == 'ok'){
				$("#load").attr('disabled','true');
				$("#clearload").attr('disabled','true');
				$("#stopit").removeAttr('disabled');
				$.get('/load/sklad2/loadxml.php'+dop);
			}
			else{
				$('#inf').html('Ошибка при загрузке и распаковке архива...');
				$('#inf').attr('class','alert alert-danger');
				$("#load").removeAttr('disabled');
				$("#clearload").removeAttr('disabled');			
			}
		});
	});
}

