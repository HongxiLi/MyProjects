package hongxi_li;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/6/19 9:50 PM
 */
public class HashCode {

    public static void main(String[] args) {

        Integer i = new Integer(50);
        Long l = new Long(50);
        Float f = new Float(50);
        Integer i2 = new Integer(0);

        // hash codes of different objects with same value are always same
        System.out.println("Hash code of " + i + " is =  " + i.hashCode());
        System.out.println("Hash code of " + l + " is =  " + l.hashCode());

        // hash code for float value i.e different from Integer and Long
        System.out.println("Hash code of " + f + " is =  " + f.hashCode());

        // hash code value of number zero(0) is zero(0)
        System.out.println("Hash code of " + i2 + " is = " + i2.hashCode());

        String str = "Hello Students";

        // hash code of string str
        System.out.println("Hash code of string is = " + str.hashCode());
    }
}
