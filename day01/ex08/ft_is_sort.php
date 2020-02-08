<?php
    function ft_is_sort($tab)
    {
        if (count($tab) == 1)
			return (TRUE);
		$tmp = $tab;
		sort($tmp);
		for ($i = 0; $i < count($tmp); $i++)
		{
			if (strcmp($tmp[$i], $tab[$i]) != 0)
				return (FALSE);
		}
		return (TRUE);
    }
?>