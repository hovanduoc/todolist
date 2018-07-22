<?php

function redirect($endpoint)
{
	if(empty($endpoint)){
		$endpoint = '';
	}
    header("Location: /{$endpoint}");
}