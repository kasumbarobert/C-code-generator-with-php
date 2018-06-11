function getSpecifier(field)
	{
		switch(field)
		{
			case 'int':
				return '%d';
				break;
			case 'float':
				return '%f';
				break;
			case 'char':
				return '%c';
				break;	
		}
	}
	