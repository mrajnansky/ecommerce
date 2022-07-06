import Spinner from "react-bootstrap/Spinner";
import Button from "react-bootstrap/Button";

export default function CustomButton({variant, type, size, onClick, disabled, loading, loadingText, text, children, ...props}) {
    return <Button
        variant={variant ? variant : 'primary'}
        type={type ? type : 'primary'}
        size={size ? size : 'lg'}
        onClick={onClick}
        disabled={disabled ? disabled : false}
        {...props}
        >
        {loading ? <div className="align-items-center">
            <Spinner animation="border" role="status">
                <span className="visually-hidden">Loading...</span>
            </Spinner>
            <span>{loadingText}</span>
        </div> : <span>{text}</span>}
        {children}
    </Button>
}