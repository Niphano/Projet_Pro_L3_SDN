// Retrieve Elements
const executeCodeBtn = document.querySelector('.editor__run');
const resetCodeBtn = document.querySelector('.editor__reset');
const modeSelect = document.querySelector('#-mode');
const themeSelect = document.querySelector('#-theme');
const saveInput = document.getElementById('RecupCode');
const latestHistoriqueCode = document.getElementById('latestHistoriqueCode').value;
const saveSelect = document.querySelector('#-save');


let defaultCode = 'console.log("Hello World!")';

let codeEditor = ace.edit("editorCode", {
    selectionStyle: "text",
});

modeSelect.addEventListener('change', () => {
    const selectedMode = modeSelect.value;
    codeEditor.getSession().setMode(selectedMode);
});

themeSelect.addEventListener('change', () => {
    const selectedTheme = themeSelect.value;
    codeEditor.setTheme(selectedTheme);
});

resetCodeBtn.addEventListener('click', () => {
    codeEditor.setValue('');
});

codeEditor.setValue(latestHistoriqueCode);

saveSelect.addEventListener('change', () => {
    const selectedSave = saveSelect.value;
    codeEditor.setValue(selectedSave);
})

codeEditor.addEventListener("input", function () {
    saveInput.innerHTML = codeEditor.getValue();
});

codeEditor.setOptions({
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true,
    fontSize: 14,
    placeholder: defaultCode,
});


