import Spinner from "react-bootstrap/Spinner";
import Button from "react-bootstrap/Button";

export default function CustomButton(props) {
    return <Button
        variant={props.variant ? props.variant : 'primary'}
        type={props.type ? props.type : 'primary'}
        size={props.size ? props.size : 'lg'}
        onClick={props.onClick}
        disabled={props.disabled ? props.disabled : false}>
        {props.loading ? <div className="align-items-center">
            <Spinner animation="border" role="status">
                <span className="visually-hidden">Loading...</span>
            </Spinner>
            <span>{props.loadingText}</span>
        </div> : <span>{props.text}</span>}
    </Button>
}