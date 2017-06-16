<?php

function read_file($filename)
{
	if( ! file_exists($filename))
	{
		return false;
	}
	return file_get_contents($filename);
}

function write_file($filename, $content)
{
	return file_put_contents($filename, $content);
}
