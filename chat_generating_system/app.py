import sys
import io

from openai import OpenAI
client = OpenAI(
    api_key='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'
)
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

def answer(reference):
    prompt = """
    Ta có cơ sở lý thuyết về các loại phân và các bệnh lý liên quan như sau:
    Loại 1: Phân dạng phân thỏ 
    Phân có dạng như phân thỏ (nhỏ, tròn, và cứng) thường là dấu hiệu của táo bón. Đây có thể là kết quả của nhiều nguyên nhân, bao gồm: 
    Chế độ ăn thiếu chất xơ: Chất xơ giúp làm mềm phân và dễ dàng đi tiêu hơn. Nếu bạn ăn ít rau, quả, ngũ cốc nguyên hạt, thì phân có thể trở nên cứng và khó đi tiêu.
    Uống ít nước: Nước giúp làm mềm phân. Thiếu nước có thể làm phân trở nên cứng và khó đi tiêu.
    Thiếu hoạt động thể chất: Vận động giúp hệ tiêu hóa hoạt động hiệu quả hơn. Lười vận động có thể làm chậm quá trình tiêu hóa.
    Thói quen đi vệ sinh không đều: Kìm nén hoặc bỏ qua nhu cầu đi tiêu có thể dẫn đến táo bón.
    Một số bệnh lý hoặc thuốc: Một số bệnh lý (như hội chứng ruột kích thích) hoặc thuốc (như thuốc giảm đau opioid) có thể gây táo bón.
    Để cải thiện tình trạng này, bạn có thể:
    Tăng cường ăn chất xơ: Bao gồm nhiều rau, quả, và ngũ cốc nguyên hạt trong chế độ ăn.
    Uống đủ nước: Uống ít nhất 8 ly nước mỗi ngày.
    Tập thể dục đều đặn: Vận động ít nhất 30 phút mỗi ngày.
    Thói quen đi vệ sinh đều đặn: Không kìm nén nhu cầu đi tiêu.

    Loại 2: Phân dạng chùm nho 
    Phân có dạng như chùm nho (nhiều viên phân nhỏ kết dính lại với nhau) thường được xem là dấu hiệu của táo bón hoặc rối loạn chức năng ruột. Tình trạng này có thể do nhiều nguyên nhân, bao gồm:
    Chế độ ăn thiếu chất xơ: Như đã đề cập trước đây, thiếu chất xơ trong chế độ ăn uống có thể làm phân trở nên cứng và khó đi tiêu.
    Uống ít nước: Không uống đủ nước có thể làm phân cứng và gây táo bón.
    Thiếu hoạt động thể chất: Thiếu vận động có thể làm chậm quá trình tiêu hóa.
    Căng thẳng và áp lực: Tình trạng căng thẳng có thể ảnh hưởng đến hệ tiêu hóa và gây ra táo bón.
    Thói quen đi vệ sinh không đều: Bỏ qua nhu cầu đi tiêu hoặc không có thói quen đi vệ sinh đều đặn cũng có thể dẫn đến táo bón.
    Một số bệnh lý hoặc thuốc: Một số bệnh lý (như hội chứng ruột kích thích) hoặc thuốc (như thuốc giảm đau opioid) có thể gây táo bón.
    Để cải thiện tình trạng này, bạn có thể:
    Tăng cường ăn chất xơ: Bổ sung thêm rau, quả, ngũ cốc nguyên hạt vào chế độ ăn.
    Uống đủ nước: Uống ít nhất 8 ly nước mỗi ngày.
    Tập thể dục đều đặn: Vận động ít nhất 30 phút mỗi ngày.
    Thói quen đi vệ sinh đều đặn: Không kìm nén nhu cầu đi tiêu và cố gắng thiết lập một thói quen đi vệ sinh hàng ngày.

    Loại 3: Phân dạng bắp ngô 
    Phân có dạng như bắp ngô, tức là phân dài và có hình dạng như những mẩu ngô kết nối lại, thường được coi là phân bình thường và là dấu hiệu của một hệ tiêu hóa hoạt động tốt. Đây là dạng phân lý tưởng, được mô tả trong Thang điểm Bristol (Bristol Stool Chart) loại 4, cho biết bạn đang có chế độ ăn uống và lối sống hợp lý.
    Tuy nhiên, nếu phân có dạng này đi kèm với các triệu chứng khác như đau bụng, chảy máu, hoặc thay đổi đột ngột trong thói quen đi tiêu, thì bạn nên đi khám bác sĩ. Các triệu chứng này có thể chỉ ra một vấn đề tiềm ẩn cần được điều trị.
    Để duy trì sức khỏe tiêu hóa tốt, hãy tiếp tục:
    Ăn nhiều chất xơ: Bổ sung rau, quả, và ngũ cốc nguyên hạt vào chế độ ăn.
    Uống đủ nước: Uống ít nhất 8 ly nước mỗi ngày.
    Tập thể dục đều đặn: Vận động ít nhất 30 phút mỗi ngày.
    Đi vệ sinh đều đặn: Thiết lập thói quen đi vệ sinh hàng ngày và không kìm nén nhu cầu đi tiêu.
    Để cải thiện tình trạng đi tiêu và duy trì sức khỏe tiêu hóa tốt, bạn có thể thực hiện một số thay đổi trong lối sống và chế độ ăn uống sau đây:
    Tăng cường chất xơ:
    Rau và quả: Bổ sung nhiều rau và quả vào chế độ ăn hàng ngày. Ví dụ: táo, lê, mận khô, rau xanh như rau cải, rau bina.
    Ngũ cốc nguyên hạt: Chọn các loại ngũ cốc nguyên hạt như yến mạch, gạo lứt, và bánh mì nguyên cám.
    Các loại đậu: Đậu lăng, đậu xanh, đậu đen, và các loại đậu khác là nguồn cung cấp chất xơ tốt.
    Uống đủ nước:
    Uống ít nhất 8 ly nước mỗi ngày. Uống nước đều đặn trong suốt cả ngày, không chỉ khi bạn cảm thấy khát.
    Tập thể dục đều đặn:
    Tập thể dục ít nhất 30 phút mỗi ngày. Các hoạt động như đi bộ, chạy, bơi lội, hoặc yoga đều có thể giúp cải thiện chức năng tiêu hóa.
    Thói quen đi vệ sinh đều đặn:
    Cố gắng thiết lập một thói quen đi vệ sinh hàng ngày. Không kìm nén nhu cầu đi tiêu, và dành thời gian để thư giãn khi đi vệ sinh.
    Hạn chế căng thẳng:
    Thực hành các kỹ thuật giảm căng thẳng như thiền, yoga, hoặc hít thở sâu để giúp hệ tiêu hóa hoạt động hiệu quả hơn.
    Hạn chế thực phẩm gây táo bón:
    Hạn chế tiêu thụ các loại thực phẩm có thể gây táo bón như thực phẩm chế biến sẵn, thức ăn nhanh, và các sản phẩm từ sữa nếu bạn nhạy cảm với lactose.
    Sử dụng bổ sung chất xơ nếu cần:
    Nếu bạn không thể bổ sung đủ chất xơ qua chế độ ăn, có thể xem xét sử dụng các loại bổ sung chất xơ theo hướng dẫn của bác sĩ.

    Loại 4: Phân dạng xúc xích 
    Phân dạng thứ 4 trên Thang đo Phân Bristol (Bristol Stool Chart) được coi là dạng phân lý tưởng và là dấu hiệu của một hệ tiêu hóa khỏe mạnh. Phân loại này thường có hình dạng như khúc dài, mềm, và mịn, dễ đi tiêu. Nếu phân của bạn thuộc dạng này, đó là một dấu hiệu tốt cho thấy bạn có chế độ ăn uống cân bằng và hệ tiêu hóa hoạt động tốt.
    Dưới đây là những điều bạn có thể tiếp tục làm để duy trì sức khỏe tiêu hóa tốt:
    Chế độ ăn uống cân bằng:
    Tiếp tục ăn nhiều rau, quả, ngũ cốc nguyên hạt, và các loại đậu để duy trì lượng chất xơ cần thiết.
    Ăn các thực phẩm giàu probiotic như sữa chua và thực phẩm lên men để duy trì sự cân bằng vi khuẩn có lợi trong ruột.
    Uống đủ nước:
    Uống ít nhất 8 ly nước mỗi ngày để giúp làm mềm phân và hỗ trợ quá trình tiêu hóa.
    Tập thể dục đều đặn:
    Duy trì thói quen tập thể dục ít nhất 30 phút mỗi ngày để giúp hệ tiêu hóa hoạt động hiệu quả hơn.
    Thói quen đi vệ sinh đều đặn:
    Thiết lập thói quen đi vệ sinh hàng ngày và không kìm nén nhu cầu đi tiêu.
    Quản lý căng thẳng:
    Thực hành các kỹ thuật giảm căng thẳng như thiền, yoga, hoặc hít thở sâu để hỗ trợ sức khỏe tổng thể và hệ tiêu hóa.

    Loại 5: Phân dạng thịt gà viên 
    Phân dạng thứ 5 trên Thang đo Phân Bristol (Bristol Stool Chart) thường có hình dạng như các cục mềm, nhỏ và rời rạc, dễ đi tiêu nhưng có thể là dấu hiệu của việc thiếu chất xơ trong chế độ ăn uống. Phân dạng này vẫn được xem là bình thường, nhưng nếu bạn thường xuyên có phân như vậy, bạn có thể cần điều chỉnh chế độ ăn uống và lối sống của mình để cải thiện sức khỏe tiêu hóa.
    Dưới đây là một số gợi ý để cải thiện tình trạng này:
    Tăng cường chất xơ:
    Rau và quả: Bổ sung nhiều rau và quả vào chế độ ăn hàng ngày, ví dụ như táo, lê, mận khô, rau cải, và rau bina.
    Ngũ cốc nguyên hạt: Chọn các loại ngũ cốc nguyên hạt như yến mạch, gạo lứt, và bánh mì nguyên cám.
    Các loại đậu: Đậu lăng, đậu xanh, đậu đen, và các loại đậu khác là nguồn cung cấp chất xơ tốt.
    Uống đủ nước:
    Uống ít nhất 8 ly nước mỗi ngày. Uống nước đều đặn trong suốt cả ngày, không chỉ khi bạn cảm thấy khát.
    Tập thể dục đều đặn:
    Tập thể dục ít nhất 30 phút mỗi ngày. Các hoạt động như đi bộ, chạy, bơi lội, hoặc yoga đều có thể giúp cải thiện chức năng tiêu hóa.
    Thói quen đi vệ sinh đều đặn:
    Cố gắng thiết lập một thói quen đi vệ sinh hàng ngày. Không kìm nén nhu cầu đi tiêu, và dành thời gian để thư giãn khi đi vệ sinh.
    Hạn chế căng thẳng:
    Thực hành các kỹ thuật giảm căng thẳng như thiền, yoga, hoặc hít thở sâu để giúp hệ tiêu hóa hoạt động hiệu quả hơn.
    Hạn chế thực phẩm gây táo bón:
    Hạn chế tiêu thụ các loại thực phẩm có thể gây táo bón như thực phẩm chế biến sẵn, thức ăn nhanh, và các sản phẩm từ sữa nếu bạn nhạy cảm với lactose.

    Loại 6: Phân dạng đồ ăn nhẹ
    Phân dạng thứ 6 trên Thang đo Phân Bristol (Bristol Stool Chart) có hình dạng như các mẩu phân mềm, xốp, và rời rạc, thường được coi là dấu hiệu của tiêu chảy nhẹ hoặc phân lỏng. Dạng phân này có thể là kết quả của nhiều nguyên nhân, bao gồm:
    Chế độ ăn uống:
    Ăn quá nhiều thực phẩm có tính nhuận tràng, chẳng hạn như thực phẩm giàu chất xơ hoặc thực phẩm cay.
    Căng thẳng và lo âu:
    Tình trạng căng thẳng và lo âu có thể ảnh hưởng đến hệ tiêu hóa và gây ra tiêu chảy.
    Nhiễm trùng hoặc bệnh lý:
    Các bệnh lý về tiêu hóa như hội chứng ruột kích thích (IBS), bệnh Crohn, hoặc nhiễm trùng đường ruột có thể gây ra phân lỏng.
    Thuốc:
    Một số loại thuốc, chẳng hạn như kháng sinh, có thể gây ra tiêu chảy như một tác dụng phụ.
    Không dung nạp thực phẩm:
    Không dung nạp lactose hoặc gluten có thể gây ra phân lỏng.
    Để cải thiện tình trạng này, bạn có thể thực hiện các biện pháp sau:
    Thay đổi chế độ ăn uống:
    Tránh ăn quá nhiều thực phẩm có tính nhuận tràng. Hạn chế thực phẩm cay, đồ uống có cồn, và caffeine.
    Bổ sung các thực phẩm giàu chất xơ hòa tan như yến mạch, chuối, và táo để giúp làm đặc phân.
    Uống đủ nước:
    Uống nhiều nước để tránh mất nước, nhưng hạn chế đồ uống có cồn và caffeine.
    Quản lý căng thẳng:
    Thực hành các kỹ thuật giảm căng thẳng như thiền, yoga, hoặc hít thở sâu để hỗ trợ hệ tiêu hóa.
    Thực phẩm probiotic:
    Ăn thực phẩm giàu probiotic như sữa chua và thực phẩm lên men để giúp cân bằng vi khuẩn có lợi trong ruột.
    Kiểm tra thuốc:
    Nếu bạn nghĩ rằng thuốc đang dùng gây ra tiêu chảy, hãy tham khảo ý kiến bác sĩ để thay đổi hoặc điều chỉnh liều lượng.

    Loại 7: Phân dạng nước sốt/nước chấm/nước suốt 
    Phân dạng thứ 7 trên Thang đo Phân Bristol (Bristol Stool Chart) có hình dạng như nước, hoàn toàn lỏng, và thường là dấu hiệu của tiêu chảy nặng. Dạng phân này có thể do nhiều nguyên nhân, bao gồm:
    Nhiễm trùng đường ruột:
    Virus, vi khuẩn hoặc ký sinh trùng gây nhiễm trùng đường ruột có thể dẫn đến tiêu chảy.
    Ngộ độc thực phẩm:
    Ăn thực phẩm bị ô nhiễm hoặc nhiễm độc có thể gây tiêu chảy cấp tính.
    Không dung nạp thực phẩm:
    Không dung nạp lactose, gluten, hoặc một số loại thực phẩm khác có thể gây tiêu chảy.
    Thuốc:
    Một số thuốc, chẳng hạn như kháng sinh, có thể gây tiêu chảy như một tác dụng phụ.
    Bệnh lý đường ruột:
    Các bệnh lý như bệnh Crohn, viêm đại tràng, hoặc hội chứng ruột kích thích (IBS) có thể gây tiêu chảy.
    Căng thẳng và lo âu:
    Tình trạng căng thẳng và lo âu cũng có thể gây ảnh hưởng đến hệ tiêu hóa và dẫn đến tiêu chảy.
    Nếu bạn gặp tình trạng phân dạng thứ 7, điều quan trọng là phải thực hiện các biện pháp sau để tránh mất nước và cải thiện tình trạng:
    Uống đủ nước:
    Uống nhiều nước, nước điện giải hoặc dung dịch bù nước để tránh mất nước.
    Chế độ ăn uống nhẹ nhàng:
    Tránh các thực phẩm gây kích thích như đồ ăn cay, dầu mỡ, và đồ uống có cồn.
    Bắt đầu với chế độ ăn BRAT (chuối, cơm, sốt táo, bánh mì nướng) để giúp hệ tiêu hóa phục hồi.
    Nghỉ ngơi:
    Nghỉ ngơi nhiều để cơ thể có thời gian hồi phục.
    Thuốc chống tiêu chảy:
    Có thể sử dụng các thuốc chống tiêu chảy không kê đơn như loperamid (Imodium) theo hướng dẫn của bác sĩ.
    Thực phẩm probiotic:
    Ăn thực phẩm giàu probiotic như sữa chua để giúp cân bằng vi khuẩn trong ruột.
    Tham khảo ý kiến bác sĩ:
    Nếu tình trạng tiêu chảy kéo dài hơn 2 ngày, đi kèm với các triệu chứng như sốt cao, đau bụng dữ dội, mất nước nghiêm trọng, hoặc có máu trong phân, bạn nên đi khám bác sĩ ngay lập tức.

    Loại 1 và 2 Có thể khó đi ngoài, có thể chỉ ra tình trạng táo bón  
    Loại 3 và 4 Là loại phân lý tưởng 
    Loại 5 Có xu hướng tiêu chảy 
    Loại 6 và 7 Tiêu chảy 

    Dựa trên cơ sở lý thuyết đó, tôi có tỉ lệ phần trăm phân thuộc các loại đó như sau:
    {reference}
    Từ những phần trăm của các loại phân và dựa vào cơ sở lý thuyết hãy cho tôi lời khuyên và bệnh lý tôi có thể gặp phải.
    Lưu ý, chỉ đưa ra bệnh lý tôi có thể gặp nhất và lời khuyên để trị bệnh như một bác sĩ chuyên nghiệp không cần nhắc lại bạn dựa trên cơ sở lý thuyết.
    """
    response = client.chat.completions.create(
    model="gpt-3.5-turbo-0125",
    messages=[
        {"role": "system", "content": "Bạn là một bác sĩ tài năng và giúp đỡ người khác, bạn có chuyên môn về phân loại và phát hiện bệnh dựa trên phân của người bệnh, bạn trả lời chi tiết, dễ hiểu."},
        {"role": "user", "content": prompt}
    ]
    )


    return response.choices[0].message.content

def main(reference):
    print(answer(reference=reference))

if __name__ == "__main__":
    # Kiểm tra có tham số không
    if len(sys.argv) > 1:
        reference = sys.argv[1]
        main(reference)
    else:
        print("No reference provided.")