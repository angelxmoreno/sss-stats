import React, {FC} from 'react';
import shortNumber from 'short-number';

type Props = {
    number: number
};

const NumberAbbreviator: FC<Props> = ({number}) => {
    return <span>{shortNumber(number)}</span>
};

export default NumberAbbreviator;
