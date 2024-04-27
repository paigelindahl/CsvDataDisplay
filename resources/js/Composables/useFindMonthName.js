export function useFindMonthName() {
    const months = [
        'Jan', 'Feb', 'Mar', 'April', 'May', 'June',
        'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
    ];

    const findMonthName = (num) => {
        if (num >=1 && num <=12) {
            return months[num - 1];
        } else {
            return '';
        }
    }

    return { findMonthName };
}
