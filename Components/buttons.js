const root = ReactDOM.createRoot(document.getElementById('button_panel'));

function Button({ text, color, inverse, isFirst, isLast }) {
    const buttonStyle = {
        backgroundColor: color,
        color: inverse ? '#fff' : '#000',
        borderTopLeftRadius: isFirst ? '8px' : '0',
        borderBottomLeftRadius: isFirst ? '8px' : '0',
        borderTopRightRadius: isLast ? '8px' : '0',
        borderBottomRightRadius: isLast ? '8px' : '0',
    };

    return (
        <button className="panel-button" style={buttonStyle}>
            {text}
        </button>
    );
}

function Panel({ buttons, shadow }) {
    return (
        <div className="button-panel">
            <div className={shadow ? 'pseudo-element' : ''}></div>
            <div className="inner-container">
                {buttons.map((button, index) => (
                    <Button
                        key={index}
                        isFirst={index === 0}
                        isLast={index === buttons.length - 1}
                        {...button}
                    />
                ))}
            </div>
        </div>
    );
}

const buttons = [
    { text: "add", color: "#eee" },
    { text: "edit", color: "#eee" },
    { text: "delete", color: "#FF5733", inverse: true }
]

const buttons2 = [
    { text: "a", color: "#34eb8f" },
    { text: "b", color: "#1f8753", inverse: true },
    { text: "c", color: "#34eb8f" },
    { text: "d", color: "#1f8753", inverse: true },
    { text: "e", color: "#34eb8f" }
]

const buttons3 = [
    { text: "info", color: "#349beb", inverse: true },
]

root.render(
    <>
        <Panel shadow buttons={buttons} />
        <Panel buttons={buttons} />
        <Panel buttons={buttons2} />
        <Panel buttons={buttons3} />
        <Panel shadow buttons={buttons3} />
    </>
);