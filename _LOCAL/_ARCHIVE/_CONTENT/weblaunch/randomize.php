<?php// --- enter the name of the file with the links to be randomized ---$file = 'headlines_bycat.shtml';// ------------------------------------------------------------------$base = strrpos($file,".")>0?substr($file,0,strrpos($file,".")):$file;$str  = file_get_contents($file);if ($str!==false){	$match = array();	//preg_match_all('/^(.*)\<a href=(.+)\>(.+)\<\/a\>(.*)$/m',$str,$match,PREG_SET_ORDER);	preg_match_all('/<!--startrand-->(.+?)<!--endrand-->/sm',$str,$match,PREG_SET_ORDER);	$matches   = count($match);		if ($matches>5)	{		for ($j = 1;$j<2;$j++)		{			$generated = array();			$out       = '';						for ($i = 0;$i<5;$i++)			{				$link = rand(0,$matches-1);								while (in_array($link,$generated))				{					$link = rand(0,$matches-1);				}								$generated[] = $link;				$out .= $match[$link][1];//."\r\n";			}						$f = fopen($base.$j.'.shtml','w');						if ($f!==false)			{				@fwrite($f,$out);				@fclose($f);			}		}	}}?>