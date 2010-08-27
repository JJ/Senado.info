	function switchit(list)
	{
		var items = document.getElementById(list).style;
		if (items.display == "none")
		{
			items.display = "block";
		}
		else
		{
			items.display = "none";
		}
	}
