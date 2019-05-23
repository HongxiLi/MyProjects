package hongxi_li.question1;

import java.util.HashSet;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/7/19 2:46 PM
 */
public class Hashcode {

    //Homework4_1_b
    private String str;

    public Hashcode(String str)
    { this.str = str;  }

    @Override  //override equals function
    public boolean equals(Object other) {

        if (this == other) return true;

        if (other == null || (this.getClass() != other.getClass()))
        { return false; }

        Hashcode guest = (Hashcode) other;
        return
                (this.str != null && str.equals(guest.str));
    }

    @Override     //override Hashcode function
    public int hashCode() {

        int result = 0;
        result = 31*result + (str !=null ? str.hashCode() : 0);
        return result;
    }


    public static void main(String[] args) {

        HashSet<Hashcode> set = new HashSet<>();
        Hashcode user1 = new Hashcode("Hello Students");
        set.add(user1);

        System.out.println("User1 Hash code of string is = " + user1.hashCode());

    }



}


