// Retrieve Elements
const executeCodeBtn = document.querySelector('.editor__run');
const resetCodeBtn = document.querySelector('.editor__reset');

let defaultCode = 'console.log("Hello World!")';

let codeEditor = ace.edit("editorCode", {
    mode: "ace/mode/javascript",
    selectionStyle: "text"
});

codeEditor.setOptions({
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true,
    fontSize: 14,
    placeholder: defaultCode,
});