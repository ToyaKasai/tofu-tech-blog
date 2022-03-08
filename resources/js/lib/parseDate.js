import { format, parseISO } from "date-fns";
import { ja } from "date-fns/locale";

const parseDate = (date, formatPattern) => {
    try {
        // ISOの形式に変換
        const utcDate = parseISO(date);

        return format(
            new Date(utcDate),
            formatPattern ? formatPattern : "yyyy年M月d日",
            { locale: ja }
        );
    } catch {
        return date;
    }
};

export default parseDate;
