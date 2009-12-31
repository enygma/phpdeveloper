
<html>
<head>
	<title>PHPDeveloper.org : PHP News, Views & Community</title>
	<link rel="stylesheet" href="/inc/css/site.css" type="text/css" />
</head>
<body>
	<table cellpadding="0" cellspacing="0" border="0" id="layout">
	<tr>
		<td id="hdr_graphic"><img src="/inc/img/logo3.gif"</td>
		<td id="hdr_search" align="right">
			<form action="/search">
				<input type="text" size="10" name="search_term">
				<input type="submit" name="search_sub" value="search" />
			</form>
		</td>
	</tr>
	<tr class="nav_links">
		<td colspan="2">
			<a href="/">home</a>
			<a href="/tutorials">tutorials</a>
			<?php 
				$uname=user_get_username();
				echo (empty($uname)) ? '<a href="/user/login">login</a>' : '<a href="/user/logout">logout '.$uname.'</a>'; 
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width="85%" valign="top" id="content">
					<?php echo $content; ?>
				</td>
				<td width="15%" valign="top">
					<?php echo $sidebar1; ?>
					<?php echo $sidebar2; ?>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
</body>
</html>