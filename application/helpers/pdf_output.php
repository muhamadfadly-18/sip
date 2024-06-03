<!-- <style type="text/css">
te
</style> -->
<body>
<table width="100%">
		<tr>
			<td align="right" style="padding-right:0px; padding-top:30px;">
				<font style="font-size:12px;">Nomor / <i>Number</i> <?php echo $ijazah->nomor_seri; ?></font>
			</td>
		</tr>
		<tr>
			<td align="right" style="padding-right:80px; padding-top:2px;">
				<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $ijazah->no_mahasiswa; ?>" width="71" height="71">
			</td>
		</tr>
</table>

<div style="position:absolute; top:50px;">
	<table width="100%">
		<tr>
			<td align="center"><h1>IJAZAH</h1></td>
		</tr>
		<tr>
			<td align="center" style="padding-top:-30px;"><font size="3"><i>CERTIFICATE</i></font></td>
		</tr>
		<tr>
			<td align="center" style="padding-top:15px;">
				<font style="font-size:12px;">diberikan kepada / <i>presented to</i></font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:3px;">
				<font style="font-size:22px;"><b><?php echo $ijazah->nama_lengkap ?></b></font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:3px;">
				<font style="font-size:12px;">Nomor Pokok Mahasiswa / <i>Student Number</i></font>
			</td>
		</tr>
		<tr>
			<td align="center">
				<font style="font-size:16px;"><b><?php echo $ijazah->no_mahasiswa ?></b></i></font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:2px;">
				<font style="font-size:12px;">lahir di / <i>born in</i> Bogor, Indonesia, 08/18/1997</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:-2px;">
				<font style="font-size:12px;">
					yang telah menyelesaikan pendidikan <?php echo $ijazah->nama_program ?>
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:-2px;">
				<font style="font-size:12px;">
					<i>having fulfilled all the requirements of the Undergraduate Program in Communication Science, Majoring Public Relations.</i>
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:0px;">
				<font style="font-size:12px;">
					Fakultas <?php echo $ijazah->fakultas ?>
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:-2px;">
				<font style="font-size:12px;">
					<i>Faculty of Information System</i>
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:1px;">
				<font style="font-size:12px;">
					Kepadanya diberikan gelar / <i>Is therefore awarded the degree of</i>
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:3px;">
				<font style="font-size:22px;"><b><?php echo $ijazah->program_pendidikan ?> <?php echo $ijazah->fakultas ?> (<?php echo $ijazah->gelar ?>)</b></font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:3px;">
				<font style="font-size:12px;">
					beserta hak dan kewajiban yang melekat pada gelar tersebut
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:-2px;">
				<font style="font-size:12px;">
					<i>with all the rights and obligations there attached</i>
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" style="padding-top:-2px;">
				<font style="font-size:12px;">
					Diberikan dan ditetapkan di / <i>issued and specified</i> in Bandung, 01/01/2017
				</font>
			</td>
		</tr>
		
	</table>
	<table style="padding-top:70px; width:100%;">
		
				<tr>
					<td align="left" style="padding-left:130px;">
						<font style="font-size:12px;">
							Dekan
						</font>
					</td>
					<td align="left" style="padding-left:250px;">
						<font style="font-size:12px;">
							Rektor
						</font>
					</td>
				</tr>
				<tr>
					<td style="padding-top:-4px; padding-left:130px;">
						<font style="font-size:12px;">
							<i>Dean</i>
						</font>
					</td>
					<td align="left" style="padding-top:-4px; padding-left:250px;">
						<font style="font-size:12px;">
							<i>Rector</i>
						</font>
					</td>
				</tr>
				<tr>
					<td style="padding-top:-4px; padding-left:130px;">
						<font style="font-size:12px;">
							Fakultas <?php echo $ijazah->fakultas ?>
						</font>
					</td>
					<td align="left" style="padding-top:-4px; padding-right:0px;">
						<font style="font-size:12px;">
							&nbsp;
						</font>
					</td>
				</tr>
				<tr>
					<td style="padding-top:-4px; padding-left:130px;">
						<font style="font-size:12px;">
							<i>Faculty of Information System</i>
						</font>
					</td>
					<td align="left" style="padding-top:-4px; padding-right:0px;">
						<font style="font-size:12px;">
							&nbsp;
						</font>
					</td>
				</tr>



				<tr>
					<td style="padding-top:50px; padding-left:130px;">
						<font style="font-size:12px;">
							<?php echo $ijazah->nm_dekan ?>
						</font>
					</td>
					<td align="left" style="padding-top:50px; padding-left:250px;">
						<font style="font-size:12px;">
							<?php echo $ijazah->nm_rektor ?>
						</font>
					</td>
				</tr>
				<tr>
					<td style="padding-top:-4px; padding-left:130px;">
						<font style="font-size:12px;">
							NIP. <?php echo $ijazah->nip_dekan ?>
						</font>
					</td>
					<td align="left" style="padding-top:-4px; padding-left:250px;">
						<font style="font-size:12px;">
							NIP. <?php echo $ijazah->nip_rektor ?>
						</font>
					</td>
				</tr>
	</table>
</div>

</body>