$("#reset").on("click",function reset()
  {
    editor.setValue("");
    editor.clearHistory();
    // cm.clearGutter("gutterId");
  });
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
      styleActiveLine: true,
      lineNumbers: true,
      lineWrapping: true,
      rtlMoveVisually: true,
      matchBrackets: true,
      mode: "text/x-c++src",
      tabSize: 3,
      smartIndent:true,
      viewportMargin: 10,
      dragDrop:false,
      extraKeys:
                  {		"Ctrl-Q": function(cm){cm.foldCode(cm.getCursor());},
                      "Ctrl-Space": "autocomplete",
                       "F11": function(cm){cm.setOption("fullScreen", !cm.getOption("fullScreen"));},
                      "Esc": function(cm){if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);}},
      foldGutter: true,
      gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      autoCloseBrackets: true,
      highlightSelectionMatches: {showToken: /\w/, annotateScrollbar: true}
    });
    editor.setSize(null, 348);

var ExcludedIntelliSenseTriggerKeys ={
                                    "8": "backspace","9": "tab","13": "enter","16": "shift",
                                    "17": "ctrl","18": "alt","19": "pause","20": "capslock",
                                    "27": "escape","33": "pageup","34": "pagedown","35": "end",
                                    "36": "home","37": "left","38": "up","39": "right","40": "down",
                                    "45": "insert","46": "delete","91": "left window key",
                                    "92": "right window key","93": "select","107": "add","109": "subtract",
                                    "110": "decimal point","111": "divide","112": "f1","113": "f2","114": "f3",
                                    "115": "f4","116": "f5","117": "f6","118": "f7","119": "f8","120": "f9",
                                    "121": "f10","122": "f11","123": "f12","144": "numlock","145": "scrolllock",
                                    "186": "semicolon","187": "equalsign","188": "comma","189": "dash","190": "period",
                                    "191": "slash","192": "graveaccent","220": "backslash","222": "quote"
                                  };
editor.on("keyup", function(editor, event)
{
  var __Cursor = editor.getDoc().getCursor();
  var __Token = editor.getTokenAt(__Cursor);

  if (!editor.state.completionActive &&
      !ExcludedIntelliSenseTriggerKeys[(event.keyCode || event.which).toString()] &&
      (event.type == "keyup"))
  {
      CodeMirror.commands.autocomplete(editor, null, { completeSingle: false });
  }
});
var input = document.getElementById("select");
function selectTheme() {
  var theme = input.options[input.selectedIndex].textContent;
  editor.setOption("theme", theme);
  location.hash = "#" + theme;
}
var choice = (location.hash && location.hash.slice(1)) ||
             (document.location.search &&
              decodeURIComponent(document.location.search.slice(1)));
if (choice) {
  input.value = choice;
  editor.setOption("theme", choice);
}
CodeMirror.on(window, "hashchange", function() {
  var theme = location.hash.slice(1);
  if (theme) { input.value = theme; selectTheme(); }
});
