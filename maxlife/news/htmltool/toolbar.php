<?
if($HTMLToolContentBG=="") { $HTMLToolContentBG="#FFFFFF"; }
?>
<table border="0" cellpadding="0" cellspacing="0" id="htmltool_table">
	<input type="hidden" name="HTMLToolContent" id="HTMLToolContent">
	<!--input type="hidden" name="HTMLToolContentBG" id="HTMLToolContentBG" value="< ? = $HTMLToolContentBG ? >"-->
	<tr> 
	  <td> <table border="0" cellspacing="0" cellpadding="0">
          <tr height="20"> 
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
            <td width="20"><img src="htmltool/Cut.gif" alt="�Ѵ" name="Cut" width="20" height="20" id="Cut" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/Copy.gif" alt="�Ѵ�͡" name="Copy" width="20" height="20" id="Copy" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/Paste.gif" alt="�ҧ" name="Paste" width="20" height="20" id="Paste" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/Undo.gif" alt="¡��ԡ" name="Undo" width="20" height="20" id="Undo" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/Redo.gif" alt="�ӫ��" name="Redo" width="20" height="20" id="Redo" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
            <td width="20"><img src="htmltool/JustifyLeft.gif" alt="�Ѵ�Դ����" name="JustifyLeft" width="20" height="20" id="JustifyLeft" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/JustifyCenter.gif" alt="�Ѵ��觡�ҧ" name="JustifyCenter" width="20" height="20" id="JustifyCenter" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/JustifyRight.gif" alt="�Ѵ�Դ���" name="JustifyRight" width="20" height="20" id="JustifyRight" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/JustifyFull.gif" alt="�Ѵ���" name="JustifyFull" width="20" height="20" id="JustifyFull" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
            <td width="20"><img src="htmltool/InsertOrderedList.gif" alt="�ӴѺ����Ţ" name="InsertOrderedList" width="20" height="20" id="InsertOrderedList" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/InsertUnorderedList.gif" alt="�ӴѺ��Ǣ��" name="InsertUnorderedList" width="20" height="20" id="InsertUnorderedList" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/Indent.gif" alt="����͹���" name="Indent" width="20" height="20" id="Indent" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/Outdent.gif" alt="����͹�͡" name="Outdent" width="20" height="20" id="Outdent" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
            <td width="20"><img src="htmltool/ForeColor.gif" alt="�յ���ѡ��" name="ForeColor" width="20" height="20" id="ForeColor" onClick="fnShowColorPicker(this)" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/BackColor.gif" alt="�վ�鹵���ѡ��" name="BackColor" width="20" height="20" id="BackColor" onClick="fnShowColorPicker(this)" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/BackgroundColor.gif" alt="�վ��" name="BackgroundColor" width="20" height="20" id="BackgroundColor" onClick="fnShowColorPicker(this)" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
            <td width="20"><img src="htmltool/InsertTable.gif" alt="�á/��� ���ҧ" name="InsertTable" width="20" height="20" id="InsertTable" onClick="fnSelectTablePicker()" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/InsertImage.gif" alt="�á/��䢤�� �ٻ�Ҿ" name="InsertImage" width="20" height="20" id="InsertImage" onClick="fnSelectImagePicker()" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/InsertLink.gif" alt="���ҧ�ԧ��" name="InsertLink" width="20" height="20" id="InsertLink" onClick="fnSelectInsertLinkPicker(); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="20"><img src="htmltool/InsertHorizontalRule.gif" alt="��鹤��" name="InsertHorizontalRule" width="20" height="20" id="InsertHorizontalRule" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
          </tr>
        </table>
		<table border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td height="20"><select name="HTMLStyle" class="htmltool_select" id="HTMLStyle" onchange="fnDoCommand('FormatBlock',this[this.selectedIndex].value);">
                <option value="Normal" selected>Style</option>
                <option value="Normal">Normal</option>
                <option value="Heading 1">Heading 1</option>
                <option value="Heading 2">Heading 2</option>
                <option value="Heading 3">Heading 3</option>
                <option value="Heading 4">Heading 4</option>
                <option value="Heading 5">Heading 5</option>
                <option value="Address">Address</option>
                <option value="Formatted">Formatted</option>
                <option value="Definition Term">Definition Term</option>
              </select></td>
            <td><select name="HTMLFont" class="htmltool_select" id="HTMLFont" onchange="fnDoCommand('FontName',this[this.selectedIndex].value);">
                <option selected>Font</option>
                <option value="Arial">Arial</option>
                <option value="Arial Black">Arial Black</option>
                <option value="Arial Narrow">Arial Narrow</option>
                <option value="Comic Sans MS">Comic Sans MS</option>
                <option value="Courier New">Courier New</option>
                <option value="Ms sans serif">Ms sans serif</option>
                <option value="System">System</option>
                <option value="Tahoma">Tahoma</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Verdana">Verdana</option>
                <option value="Wingdings">Wingdings</option>
              </select></td>
            <td><select name="HTMLSize" class="htmltool_select" id="HTMLSize" onchange="fnDoCommand('FontSize',this[this.selectedIndex].value);">
                <option selected>Size</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="10">10</option>
                <option value="12">12</option>
                <option value="14">14</option>
              </select></td>
            <td><img src="htmltool/Bold.gif" alt="���˹�" name="Bold" width="20" height="20" id="Bold" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td><img src="htmltool/Italic.gif" alt="������§" name="Italic" width="20" height="20" id="Italic" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td><img src="htmltool/UnderLine.gif" alt="�մ�����" name="UnderLine" width="20" height="20" id="UnderLine" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td><img src="htmltool/StrikeThrough.gif" alt="�մ�Ѻ" name="StrikeThrough" width="20" height="20" id="StrikeThrough" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td><img src="htmltool/SubScript.gif" alt="�������" name="SubScript" width="20" height="20" id="SubScript" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td><img src="htmltool/SuperScript.gif" alt="���¡���ѧ" name="SuperScript" width="20" height="20" id="SuperScript" onClick="fnDoCommand(this.id); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"></td>
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
            
          <td width="34" align="center"><img src="htmltool/html.gif" alt="�ʴ���" name="html" width="34" height="20" id="html" onClick="fnSwitchMode(this); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)"><img src="htmltool/abcd.gif" alt="��͹��" name="abcd" width="34" height="20" id="abcd" onClick="fnSwitchMode(this); fnButtonOut(this);" onMouseDown="fnButtonDown(this)" onMouseOver="fnButtonOver(this)" onMouseOut="fnButtonOut(this)" style="display:none"></td>
            <td width="4" align="center" valign="middle"><img src="htmltool/indent_icon.gif" width="2" height="14"></td>
          </tr>
        </table></td>
	</tr>
</table>