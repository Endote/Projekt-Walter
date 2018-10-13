function toggle_div_visibility(id)	{

	var divele = document.getElementById(id);

	if(divele.style.display == 'none')
			divele.style.display = 'block';

	else
		divele.style.display = 'none';

}
